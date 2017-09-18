<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function getUserContracts($user_id){
        $this->db->select('id, contract_number, monto_total, monto_abonado, monto_cuota');
        $this->db->where('contact_id', $user_id);
        $this->db->from('contratos_account');
        return $this->db->get()->result_array();
    }


    // private function openApartadosAccount($userID, $customerID, $apartado$id){}

    private function openContratosAccount($userID, $customerID, $contractID, $monto_total, $prima, $mes_cobro, $monto_cuota){

        $saldo_actual = $monto_total - $prima;

        $data['contract_number'] = $contractID;
        $data['contact_id'] = $customerID;
        $data['created_by'] = $userID;
        $data['status'] = "A"; // active
        $data['monto_total'] = $monto_total;
        $data['prima'] = $prima;
        $data['mes_cobro'] = $mes_cobro;
        $data['monto_cuota'] = $monto_cuota;
        $data['saldo'] = $saldo_actual;
        $data['saldo_anterior'] = $monto_total;
        $data['monto_abonado'] = $prima;
        
        $this->db->insert('contratos_account', $data);
        return $this->db->insert_id();
    }


    private function openApartadosAccount($userID, $customerID, $contractID, $monto_total, $prima, $mes_cobro=''){

        $saldo_actual = $monto_total;

        $data['contract_number'] = $contractID;
        $data['contact_id'] = $customerID;
        $data['created_by'] = $userID;
        $data['status'] = "A"; // active
        $data['monto_total'] = $monto_total;
        // $data['mes_cobro'] = $mes_cobro;
        // $data['monto_cuota'] = $monto_cuota;
        $data['saldo'] = $saldo_actual;
        $data['saldo_anterior'] = $monto_total;
        $data['monto_abonado'] = $prima;
        
        $this->db->insert('apartados_account', $data);
        return $this->db->insert_id();
    }


    private function newTransaction($userID, $contractID, $tipo_servicio, $monto, $metodo_pago, $descripcion, $detalles, $saldo_anterior, $status = 'A' ){
        $data['servicio_id'] = $contractID;
        $data['servicio_tipo'] = $tipo_servicio;
        $data['monto'] = $monto;
        $data['status'] = $status;
        $data['descripcion'] = $descripcion;
        $data['metodo_pago'] = $metodo_pago;
        $data['realizado_por'] = $userID;    
        $data['detalles'] = $detalles;
        $data['saldo_anterior'] = $saldo_anterior;

        $this->db->insert('bk_transaccion', $data);
        return $this->db->insert_id();
    }

    private function getAccountByContractID($contractID){
        $sql_account = "select * from bk_contratos_account where contract_number = ?";
        return $this->db->query( $sql_account, array( $contractID ) )->row_array();
    }
    private function getApartadoAccountByContractID($contractID){
        $sql_account = "select * from bk_apartados_account where contract_number = ?";
        return $this->db->query( $sql_account, array( $contractID ) )->row_array();
    }

    private function applyContractPay($contractID, $monto, $mes_cobro){
        
        $acc = $this->getAccountByContractID($contractID);

        // $monto_abonado;
        $saldo = $acc['saldo'];
        $saldo_anterior = $acc['saldo_anterior'];
        $mes_cobro = $acc['mes_cobro'];
        $monto_abonado = $acc['monto_abonado'];

        $new_saldo = $saldo - $monto;
        $new_monto_abonado = $monto_abonado + $monto;
        $new_saldo_anterior = $saldo_anterior - $monto;


        $data['saldo'] = $new_saldo;
        $data['monto_abonado'] = $new_monto_abonado;
        $data['saldo_anterior'] = $new_saldo_anterior;
        $data['mes_cobro'] = $mes_cobro;
        $this->db->where('contract_number', $contractID);
        $this->db->update('contratos_account', $data);
    }


    private function applyApartadosPay($contractID, $monto){
        
        $acc = $this->getApartadoAccountByContractID($contractID);

        // $monto_abonado;
        $saldo = $acc['saldo'];
        $saldo_anterior = $acc['saldo_anterior'];
        // $mes_cobro = $acc['mes_cobro'];
        $monto_abonado = $acc['monto_abonado'];

        $new_saldo = $saldo - $monto;
        $new_monto_abonado = $monto_abonado + $monto;
        $new_saldo_anterior = $saldo_anterior - $monto;


        $data['saldo'] = $new_saldo;
        $data['monto_abonado'] = $new_monto_abonado;
        $data['saldo_anterior'] = $new_saldo_anterior;
        // $data['mes_cobro'] = $mes_cobro;
        $this->db->where('contract_number', $contractID);
        $this->db->update('apartados_account', $data);
    }

    public function contractPay(){
        
        $contractID = $this->input->post('contractID');
        $monto = $this->input->post('abono');
        $forma_pago = $this->input->post('tipo_pago');
        $detalles = $this->input->post('no_transferencia');
        $concepto = $this->input->post('concepto');
        $mes_cobro = $this->input->post('mes_cobro');

        $acc = $this->getAccountByContractID($contractID);
        // echo 'contractID '. $contractID;
        // echo '<pre>';
        // print_r($acc);
        // echo '<pre>';
        // die();

        $transactionID = $this->newTransaction($_SESSION['user_id'], $acc['id'], 'contrato', $monto,  $forma_pago, $concepto, $detalles, $acc['saldo_anterior']);
            // print_r($transactionID);die();
            if($transactionID>0){
                $this->applyContractPay($acc['id'], $monto, $mes_cobro);
            }
    }


    public function apartadoPay(){
        $contractID = $this->input->post('contractID');
        $monto = $this->input->post('abono');
        $forma_pago = $this->input->post('tipo_pago');
        $detalles = $this->input->post('no_transferencia');
        $concepto = $this->input->post('concepto');
        $mes_cobro = $this->input->post('mes_cobro');

        $acc = $this->getApartadoAccountByContractID($contractID);
        // echo 'contractID '. $contractID;
        // echo '<pre>';
        // print_r($acc);
        // echo '<pre>';
        // die();

        $transactionID = $this->newTransaction($_SESSION['user_id'], $acc['id'], 'apartado', $monto,  $forma_pago, $concepto, $detalles,$acc['saldo_anterior']);
            // print_r($transactionID);die();
            if($transactionID>0){
                $this->applyApartadosPay($acc['id'], $monto, $mes_cobro);
            }   
    }
    // private function openFuneralesAccount1($userID, $customerID, $apartado$id){}    


    public function createContract(){
        // $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];
       
        // $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['fecha_inclusion'] = $this->input->post('fecha_inclusion');
        $data['ruta'] = $this->input->post('ruta');
        $data['vendedor'] = $this->input->post('vendedor');
        $data['forma_pago'] = $this->input->post('forma_pago');
        $data['no_contrato'] = $this->input->post('contract_id');

        $data['monto_total'] = $this->input->post('amount');
        $data['prima'] = $this->input->post('prima');
        $data['monto_cuota'] = $this->input->post('cuota');
        $data['loc_1'] = $this->input->post('local_1');
        $data['loc_2'] = $this->input->post('local_2');
        $data['loc_3'] = $this->input->post('local_3');
        $data['no_recibo'] = $this->input->post('no_recibo');
         
        $data['mes_cobro'] = $this->input->post('mes_cobro');
        $data['saldo_anterior'] = $this->input->post('saldo_anterior');
        $data['saldo_actual'] = $this->input->post('saldo_actual'); 

        $data['observaciones'] = $this->input->post('observaciones'); 

        $this->db->insert('contratos', $data);
        $contractID = $this->db->insert_id();


        $accID = $this->openContratosAccount($_SESSION['user_id'],  $this->input->post('contact_id'), $contractID, $this->input->post('amount'), 
                                    0, $this->input->post('mes_cobro'), $this->input->post('cuota') );
        

        if($accID > 0){
            $transactionID = $this->newTransaction($_SESSION['user_id'], $accID, 'contrato', $this->input->post('prima'),  $this->input->post('forma_pago'), 'Prima', '', 0);
            if($transactionID>0){
                $this->applyContractPay($accID, $this->input->post('prima'), $this->input->post('mes_cobro'));
            }
        }
        
        //Create account
    }

    public function createApartado(){
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];

        $data['cremacion'] =  $this->input->post('cremacion') ;
        $data['autopsia'] =  $this->input->post('autopsia') ;
        $data['tecnico'] =  $this->input->post('tecnico') ;
        $data['costo'] =  $this->input->post('costo') ;
        $data['urna'] =  $this->input->post('urna') ;
        $data['preservacion'] =  $this->input->post('preservacion') ;
        $data['monto'] =  $this->input->post('monto') ;
        $data['costo_total'] =  $this->input->post('costo_total') ;
        $data['saldo_anterior'] =  $this->input->post('saldo_anterior') ;
        $data['abono'] =  $this->input->post('abono') ;
        $data['saldo_actual'] =  $this->input->post('saldo_actual') ;


        $data['observaciones'] = $this->input->post('observaciones'); 

        $this->db->insert('apartados', $data);
        $contractID = $this->db->insert_id();

        $accID = $this->openApartadosAccount( $_SESSION['user_id'],$this->input->post('contact_id'), $contractID, $this->input->post('costo_total'), 0);

        if($accID > 0){
            $transactionID = $this->newTransaction($_SESSION['user_id'], $accID, 'apartado', $this->input->post('abono'), 'efectivo', 'Prima', '',0);
            if($transactionID>0){
                $this->applyApartadosPay($accID, $this->input->post('abono') );
            }
        }
    }

     public function updateContract(){
        $service_id = $this->input->post('service_id');
        // $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];
       
        // $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['fecha_inclusion'] = $this->input->post('fecha_inclusion');
        $data['ruta'] = $this->input->post('ruta');
        $data['vendedor'] = $this->input->post('vendedor');
        $data['forma_pago'] = $this->input->post('forma_pago');
        $data['no_contrato'] = $this->input->post('contract_id');

        $data['monto_total'] = $this->input->post('amount');
        $data['prima'] = $this->input->post('prima');
        $data['monto_cuota'] = $this->input->post('cuota');
        $data['loc_1'] = $this->input->post('local_1');
        $data['loc_2'] = $this->input->post('local_2');
        $data['loc_3'] = $this->input->post('local_3');
        $data['no_recibo'] = $this->input->post('no_recibo');
         
        $data['mes_cobro'] = $this->input->post('mes_cobro');
        $data['saldo_anterior'] = $this->input->post('saldo_anterior');
        $data['saldo_actual'] = $this->input->post('saldo_actual'); 

        $data['observaciones'] = $this->input->post('observaciones'); 

        
       
        $this->db->where('id', $service_id);
        $this->db->update('contratos', $data);
    }
    
    public function updateApartado(){
        $service_id = $this->input->post('service_id');
        // $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('contact_id') ;
        $data['created_by'] = $_SESSION['user_id'];

        $data['cremacion'] =  $this->input->post('cremacion') ;
        $data['autopsia'] =  $this->input->post('autopsia') ;
        $data['tecnico'] =  $this->input->post('tecnico') ;
        $data['costo'] =  $this->input->post('costo') ;
        $data['urna'] =  $this->input->post('urna') ;
        $data['preservacion'] =  $this->input->post('preservacion') ;
        $data['monto'] =  $this->input->post('monto') ;
        $data['costo_total'] =  $this->input->post('costo_total') ;
        $data['saldo_anterior'] =  $this->input->post('saldo_anterior') ;
        $data['abono'] =  $this->input->post('abono') ;
        $data['saldo_actual'] =  $this->input->post('saldo_actual') ;


        $data['observaciones'] = $this->input->post('observaciones'); 


        $this->db->where('id', $service_id);
        $this->db->update('apartados', $data);

    }

    public function create_servicio() {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_first_name'] = $this->input->post('deceased_first_name');
        $data['deceased_last_name1'] = $this->input->post('deceased_last_name1');
        $data['deceased_last_name2'] = $this->input->post('deceased_last_name2');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id') ? $this->input->post('client_id') : NULL;
        $data['relationship'] = $this->input->post('relationship');
        $data['payment_method'] = $this->input->post('payment_method');
        $data['amount'] = $this->input->post('amount');
        $data['balance'] = $this->input->post('balance');
        $data['coffin'] = $this->input->post('coffin');
        $data['bill'] = $this->input->post('bill');
        $data['veiling_room'] = $this->input->post('veiling_room');
        $data['veiling_site'] = $this->input->post('veiling_site');
        $data['transfers'] = $this->input->post('transfers');
        $data['forgetfulness'] = $this->input->post('forgetfulness');
        $data['pathology'] = $this->input->post('pathology');
        $data['pathology_technician'] = $this->input->post('pathology_technician');
        $data['flowers'] = $this->input->post('flowers');
        $data['cremation'] = $this->input->post('cremation');
        $data['morgue'] = $this->input->post('morgue');
        $data['transfer_address'] = $this->input->post('transfer_address');
        $data['driver'] = $this->input->post('driver');
        $data['float'] = $this->input->post('float');
        $data['transfer_time'] = $this->input->post('transfer_time');
        $data['vault_coffin'] = $this->input->post('vault_coffin');
        $data['candlestick'] = $this->input->post('candlestick');
        $data['pushcart'] = $this->input->post('pushcart');
        $data['curtain'] = $this->input->post('curtain');
        $data['transfer_observations'] = $this->input->post('transfer_observations');
        $data['arrangements'] = $this->input->post('arrangements');
        $data['pedestal'] = $this->input->post('pedestal');
        $data['lectern'] = $this->input->post('lectern');
        $data['carpet'] = $this->input->post('carpet');
        $data['service_date'] = $this->input->post('service_date');
        $data['service_hour'] = $this->input->post('service_hour');
        $data['church'] = $this->input->post('church');
        $data['cemetery'] = $this->input->post('cemetery');
        $data['service_float'] = $this->input->post('service_float');
        $data['service_driver'] = $this->input->post('service_driver');
        $data['decoration_float'] = $this->input->post('decoration_float');
        $data['decoration_driver'] = $this->input->post('decoration_driver');
        $data['service_observations'] = $this->input->post('service_observations');
        $data['contract_id'] = $this->input->post('contract_id');
        $data['user_id'] = $this->input->post('user_id');
        $data['client_first_name'] = $this->input->post('client_first_name');
        $data['client_last_name1'] = $this->input->post('client_last_name1');
        $data['client_last_name2'] = $this->input->post('client_last_name2');
        $data['client_id_card'] = $this->input->post('client_id_card');
        $data['client_email'] = $this->input->post('client_email');
        $data['client_phone'] = $this->input->post('client_phone');
        $data['client_phone2'] = $this->input->post('client_phone2');
        $data['client_phone3'] = $this->input->post('client_phone3');
        $data['tributes'] = $this->input->post('tributes');
        $data['pathology_cost'] = $this->input->post('pathology_cost');
        $data['autopsy'] = $this->input->post('autopsy');
        $data['autopsy_technician'] = $this->input->post('autopsy_technician'); 
        $data['autopsy_cost'] = $this->input->post('autopsy_cost');
        $data['morgue_address'] = $this->input->post('morgue_address'); 
        $data['veiling_site_address'] = $this->input->post('veiling_site_address');
        $data['funeral_date'] = $this->input->post('funeral_date');
        $data['funeral_time'] = $this->input->post('funeral_time'); 
        $data['urn'] = $this->input->post('urn');
        $data['abono'] = $this->input->post('abono');
        $data['contrato_account_id1'] = $this->input->post('contrato_account_id1');
        $data['contrato_account_id2'] = $this->input->post('contrato_account_id2');
        $data['contrato_account_id3'] = $this->input->post('contrato_account_id3');

        $this->db->insert('service', $data);
        $id = $this->db->insert_id();

        if( $data['type'] == 'contrato' ){
            $this->servicio_model->create_contract($id);
        }
        else if( $data['type'] == 'funecredito' ){
            $this->servicio_model->create_funecredito($id);
        }
        else if($data['type'] == 'apartado' ){
            $this->servicio_model->create_apartado($id);
        }
    }

    public function create_apartado($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('balance');
        $data['fecha_creacion'] = date('Y-m-d');

        $this->db->insert('apartados_account', $data);
    }

    public function create_funecredito($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('saldoFunecredito');
        $data['prima'] = $this->input->post('primaFunecredito');
        $data['monto_cuota'] = $this->input->post('cuotaFunecredito');
        $data['interes'] = $this->input->post('interesFunecredito');
        $data['fecha_creacion'] = date('Y-m-d');
        $data['cuotas_pendientes'] = $this->input->post('plazoFunecredito');
        $data['tiempo_servicio'] = $this->input->post('plazoFunecredito');
        $data['saldo'] = $data['monto_total'];

        $this->db->insert('funecredito_account', $data);
    }

    public function create_contract($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id') ;
        
       
        // $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['fecha_inclusion'] = $this->input->post('fecha_inclusion');
        $data['ruta'] = $this->input->post('ruta');
        $data['vendedor'] = $this->input->post('monto_cuota');
        $data['forma_pago'] = $this->input->post('forma_pago');
        $data['contract_number'] = $this->input->post('contract_id');

        $data['monto_total'] = $this->input->post('amount');
        $data['prima'] = $this->input->post('prima');
        $data['monto_cuota'] = $this->input->post('cuota');
        $data['loc_1'] = $this->input->post('local_1');
        $data['loc_2'] = $this->input->post('local_2');
        $data['loc_3'] = $this->input->post('local_3');
        $data['no_recibo'] = $this->input->post('no_recibo');
         
        $data['mes_cobro'] = $this->input->post('mes_cobro');
        $data['saldo_anterior'] = $this->input->post('saldo_anterior');
        $data['saldo_actual'] = $this->input->post('saldo_actual'); 
         

        // $data['fecha_creacion'] = date('Y-m-d');
        
        // $data['cuotas_pendientes'] = $this->input->post('tiempo_contrato');
        // $data['saldo'] = $data['monto_total'];

        $this->db->insert('contratos_account', $data);
    }

    public function update_servicio($service_id) {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_first_name'] = $this->input->post('deceased_first_name');
        $data['deceased_last_name1'] = $this->input->post('deceased_last_name1');
        $data['deceased_last_name2'] = $this->input->post('deceased_last_name2');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id') ? $this->input->post('client_id') : NULL;
        $data['relationship'] = $this->input->post('relationship');
        $data['payment_method'] = $this->input->post('payment_method');
        $data['contract_id'] = $this->input->post('contract_id');
        $data['amount'] = $this->input->post('amount');
        $data['balance'] = $this->input->post('balance');
        $data['coffin'] = $this->input->post('coffin');
        $data['bill'] = $this->input->post('bill');
        $data['veiling_room'] = $this->input->post('veiling_room');
        $data['veiling_site'] = $this->input->post('veiling_site');
        $data['transfers'] = $this->input->post('transfers');
        $data['forgetfulness'] = $this->input->post('forgetfulness');
        $data['pathology'] = $this->input->post('pathology');
        $data['pathology_technician'] = $this->input->post('pathology_technician');
        $data['flowers'] = $this->input->post('flowers');
        $data['cremation'] = $this->input->post('cremation');
        $data['morgue'] = $this->input->post('morgue');
        $data['transfer_address'] = $this->input->post('transfer_address');
        $data['driver'] = $this->input->post('driver');
        $data['float'] = $this->input->post('float');
        $data['transfer_time'] = $this->input->post('transfer_time');
        $data['vault_coffin'] = $this->input->post('vault_coffin');
        $data['candlestick'] = $this->input->post('candlestick');
        $data['pushcart'] = $this->input->post('pushcart');
        $data['curtain'] = $this->input->post('curtain');
        $data['transfer_observations'] = $this->input->post('transfer_observations');
        $data['arrangements'] = $this->input->post('arrangements');
        $data['pedestal'] = $this->input->post('pedestal');
        $data['lectern'] = $this->input->post('lectern');
        $data['carpet'] = $this->input->post('carpet');
        $data['service_date'] = $this->input->post('service_date');
        $data['service_hour'] = $this->input->post('service_hour');
        $data['church'] = $this->input->post('church');
        $data['cemetery'] = $this->input->post('cemetery');
        $data['service_float'] = $this->input->post('service_float');
        $data['service_driver'] = $this->input->post('service_driver');
        $data['decoration_float'] = $this->input->post('decoration_float');
        $data['decoration_driver'] = $this->input->post('decoration_driver');
        $data['service_observations'] = $this->input->post('service_observations');
        $data['user_id'] = $this->input->post('user_id');
        $data['client_first_name'] = $this->input->post('client_first_name');
        $data['client_last_name1'] = $this->input->post('client_last_name1');
        $data['client_last_name2'] = $this->input->post('client_last_name2');
        $data['client_id_card'] = $this->input->post('client_id_card');
        $data['client_email'] = $this->input->post('client_email');
        $data['client_phone'] = $this->input->post('client_phone');
        $data['client_phone2'] = $this->input->post('client_phone2');
        $data['client_phone3'] = $this->input->post('client_phone3');
        $data['abono'] = $this->input->post('abono');
        $data['tributes'] = $this->input->post('tributes');
        $data['pathology_cost'] = $this->input->post('pathology_cost');
        $data['autopsy'] = $this->input->post('autopsy');
        $data['autopsy_technician'] = $this->input->post('autopsy_technician');
        $data['autopsy_cost'] = $this->input->post('autopsy_cost');
        $data['morgue_address'] = $this->input->post('morgue_address');
        $data['veiling_site_address'] = $this->input->post('veiling_site_address');
        $data['funeral_date'] = $this->input->post('funeral_date');
        $data['funeral_time'] = $this->input->post('funeral_time');
        $data['urn'] = $this->input->post('urn');
        $data['contrato_account_id1'] = $this->input->post('contrato_account_id1');
        $data['contrato_account_id2'] = $this->input->post('contrato_account_id2');
        $data['contrato_account_id3'] = $this->input->post('contrato_account_id3');

        $this->db->where('service_id', $service_id);
        $this->db->update('service', $data);

        if( $data['type'] == 'contrato' ){
            $this->servicio_model->update_contract($service_id);
        }
        else if($data['type'] == 'funecredito' ){
            $this->servicio_model->update_funecredito($service_id);
        }
        else if($data['type'] == 'apartado' ){
            $this->servicio_model->update_apartado($service_id);
        }
    }

    public function update_apartado($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('balance');
        $data['fecha_creacion'] = date('Y-m-d');

        $this->db->where('service_id', $service_id);
        $this->db->update('apartados_account', $data);
    }

    public function update_funecredito($service_id){
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('saldoFunecredito');
        $data['prima'] = $this->input->post('primaFunecredito');
        $data['monto_cuota'] = $this->input->post('cuotaFunecredito');
        $data['interes'] = $this->input->post('interesFunecredito');
        $data['tiempo_servicio'] = $this->input->post('plazoFunecredito');

        $this->db->where('service_id', $service_id);
        $this->db->update('funecredito_account', $data);
    }

    public function update_contract($service_id){
        $data['contact_id'] =  $this->input->post('client_id') ;
        $data['monto_total'] = $this->input->post('amount');
        $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['monto_cuota'] = $this->input->post('monto_cuota');
        $data['contract_number'] = $this->input->post('contract_id');

        $this->db->where('service_id', $service_id);
        $this->db->update('contratos_account', $data);
    }

    public function delete_servicio_contrato($service_id) {
        $this->db->where('id', $service_id);
        $this->db->delete('contratos');
    }   

    public function delete_servicio_apartado($service_id) {
        $this->db->where('id', $service_id);
        $this->db->delete('apartados');
    }   
}