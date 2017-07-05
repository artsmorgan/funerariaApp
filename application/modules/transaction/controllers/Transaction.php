<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        checksavedlogin(); #defined in auth helper

        if (!is_loggedin()) {
            if (count($_POST) <= 0)
                $this->session->set_userdata('req_url', current_url());
            redirect(site_url('admin/auth'));
        }

        if (!is_admin()) {
            if (count($_POST) <= 0)
                $this->session->set_userdata('req_url', current_url());
            redirect(site_url('admin/auth'));
        }

        $this->load->model('transaction_model');
        //$this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function start_transaction(){
        // $this->load->model('transaction_model');
        $id = intval( trim( $_POST['id']) );
        $amount = (float) trim( $_POST['amount'] );
        $metodo_pago = trim( $_POST['metodo_pago'] );
        $desc = (float) trim( $_POST['desc'] );
        $type = trim( $_POST['type'] );

        $response = array( 'errors' => array(), 'success' => array() );

        if( !preg_match( "/^(?:funecredito|apartado|contrato)$/i", $type ) ){
            $response['errors'][] = 'Tipo de servicio invalido';
        }

        if( empty( $id ) ){
            $response['errors'][] = 'El id es requerido';
        }

        if( empty( $amount ) ){
            $response['errors'][] = 'La cantidad abonado es requerido';
        }

        if( empty( $metodo_pago ) ){
            $response['errors'][] = 'El método de pago es requerido';
        }

        if( $amount < 0 ){
            $response['errors'][] = 'Cantidad debe ser un número positivo,';
        }

        if( empty( $response['errors'] ) ){
            $account_data = $this->transaction_model->{"get_$type"}($id);

            if( empty( $account_data ) ){
                $response['errors'][] = 'No se encontro el contrato';
            }
            else{
                if ( $type !== 'apartado' && $amount < $account_data['monto_cuota'] ){
                    $response['errors'][] = 'La cantidad abonada debe ser mínimo de <span class="format-currency">' . $account_data['monto_cuota'] . '</span>';
                }

                if ( $amount > $account_data['saldo'] ){
                    $response['errors'][] = 'La cantidad abonada no puede ser mayor a <span class="format-currency">' . $account_data['monto_total'] . '</span>';
                }

                if( empty( $response['errors'] ) ){
                    $args_new = array();
                    $args_new['monto_abonado'] = $account_data['monto_abonado'] + $amount;
                    $args_new['saldo'] = $account_data['saldo'] - $amount;
                    $args_new['status'] = 'P';

                    if( $type !== 'apartado' ){
                        $cuotas_pagadas_hoy = floor( $amount / $account_data['monto_cuota'] );
                        $args_new['cuotas_pagadas'] = $cuotas_pagadas_hoy + $account_data['cuotas_pagadas'];
                        $args_new['cuotas_pendientes'] = $account_data['cuotas_pendientes'] - $cuotas_pagadas_hoy;
                        //actualice el monto cuota
                        $monto_pendiente = $account_data['monto_total'] - $args_new['monto_abonado'];
                        $args_new['monto_cuota'] = (float) ( $monto_pendiente < $account_data['monto_cuota']  ? $monto_pendiente : $account_data['monto_cuota'] );
                    }
                    
                    $args_transaction = array(
                        'servicio_id'    => $account_data['service_id'], 
                        'servicio_tipo' => $type,
                        'monto'         => $amount,
                        'status'        => 'P',
                        'descripcion'   => $desc,
                        'metodo_pago'   => $metodo_pago,
                        'fecha_pago'    => date('Y-m-d')
                    );

                    $transaction_id = $this->transaction_model->add_transaction( $args_transaction );

                    $args_transaction_log = array(
                        'id_transaccion'    => $transaction_id,
                        'monto_total'       => $account_data['monto_total'],
                        'monto_pagado'      => $args_new['monto_abonado'],
                        'monto_anterior'    => $account_data['monto_abonado'],
                        'created_at'        => date('Y-m-d')
                    );

                    $this->transaction_model->add_transaction_log( $args_transaction_log );

                    $this->transaction_model->{"update_$type"}($account_data['id'], $args_new );

                    $response['success'][] = 'Transacción realizada con éxito';
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        die();
    }
}