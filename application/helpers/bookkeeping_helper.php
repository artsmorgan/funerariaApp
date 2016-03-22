<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_country_name_by_id'))
{
	function get_country_name_by_id ($id)
	{
		if($id==0)
			return '';

		$CI = get_instance();
		$CI->load->database();
		$query = $CI->db->get_where('country',array('id'=>$id));
		if($query->num_rows()>0)
		{
			$row = $query->row();

			return $row->short_name;
		}
		else
		{
			return '';
		}
	}
}

if ( ! function_exists('get_city_name_by_id'))
{
    function get_city_name_by_id ($id)
    {
        if($id==0)
            return '';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('city',array('city_id'=>$id));
        if($query->num_rows()>0)
        {
            $row = $query->row();

            return $row->city_name;
        }
        else
        {
            return '';
        }
    }
}

if ( ! function_exists('get_country_calling_code_by_id'))
{
    function get_country_calling_code_by_id ($id)
    {
        if($id==0)
            return '';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('country',array('id'=>$id));
        if($query->num_rows()>0)
        {
            $row = $query->row();

            return $row->calling_code;
        }
        else
        {
            return '';
        }
    }
}

if ( ! function_exists('get_store_name_by_id'))
{
    function get_store_name_by_id ($id)
    {
        if($id==0)
            return '';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('stores',array('id'=>$id));
        if($query->num_rows()>0)
        {
            $row = $query->row();

            return $row->store_name;
        }
        else
        {
            return '';
        }
    }
}

if ( ! function_exists('get_all_stores_by_owner_id'))
{
    function get_all_stores_by_owner_id ($owner_id)
    {
        if($owner_id==0)
            return '';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('stores',array('owner_id'=>$owner_id));
        if($query->num_rows()>0)
        {


            return $query;
        }
        else
        {
            return '';
        }
    }
}

if ( ! function_exists('get_employee_store_id'))
{
    function get_employee_store_id ($user_id)
    {
        if($user_id==0)
            return '';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('user',array('user_id'=>$user_id));
        if($query->num_rows()>0)
        {

            $row = $query->row();

            return $row->store_id;
        }
        else
        {
            return '';
        }
    }
}

if ( ! function_exists('get_all_currencies'))
{
    function get_all_currencies($key=0)
    {
        $currencies= array(
            "ALL"=> array("Albania, Leke", "4c, 65, 6b"),
            "AFN"=> array("Afghanistan, Afghanis", "60b"),
            "ARS"=> array("Argentina, Pesos", "24"),
            "AWG"=> array("Aruba, Guilders (also called Florins)", "192"),
            "AUD"=> array("Australia, Dollars", "24"),
            "AZN"=> array("Azerbaijan, New Manats", "43c, 430, 43d"),
            "BSD"=> array("Bahamas, Dollars", "24"),
            "BDT"=> array("Bangladesh, Taka", "9f3"),
            "BBD"=> array("Barbados, Dollars", "24"),
            "BYR"=> array("Belarus, Rubles", "70, 2e"),
            "BZD"=> array("Belize, Dollars", "42, 5a, 24"),
            "BMD"=> array("Bermuda, Dollars", "24"),
            "BOB"=> array("Bolivia, Bolivianos", "24, 62"),
            "BAM"=> array("Bosnia and Herzegovina, Convertible Marka", "4b, 4d"),
            "BWP"=> array("Botswana, Pulas", "50"),
            "BGN"=> array("Bulgaria, Leva", "43b, 432"),
            "BRL"=> array("Brazil, Reais", "52, 24"),
            "BND"=> array("Brunei Darussalam, Dollars", "24"),
            "KHR"=> array("Cambodia, Riels", "17db"),
            "XOF"=> array("Cameroon, CFA franc",""),
            "CAD"=> array("Canada, Dollars", "24"),
            "KYD"=> array("Cayman Islands, Dollars", "24"),
            "CLP"=> array("Chile, Pesos", "24"),
            "CNY"=> array("China, Yuan Renminbi", "a5"),
            "COP"=> array("Colombia, Pesos", "24"),
            "CRC"=> array("Costa Rica, Colón", "20a1"),
            "HRK"=> array("Croatia, Kuna", "6b, 6e"),
            "CUP"=> array("Cuba, Pesos", "20b1"),
            "CZK"=> array("Czech Republic, Koruny", "4b, 10d"),
            "DKK"=> array("Denmark, Kroner", "6b, 72"),
            "DOP"=> array("Dominican Republic, Pesos", "52, 44, 24"),
            "XCD"=> array("East Caribbean, Dollars", "24"),
            "EGP"=> array("Egypt, Pounds", "a3"),
            "SVC"=> array("El Salvador, Colones", "24"),
            "EEK"=> array("Estonia, Krooni", "6b, 72"),
            "EUR"=> array("Euro", "20ac"),
            "FKP"=> array("Falkland Islands, Pounds", "a3"),
            "FJD"=> array("Fiji, Dollars", "24"),
            "GHC"=> array("Ghana, Cedis", "a2"),
            "GIP"=> array("Gibraltar, Pounds", "a3"),
            "GTQ"=> array("Guatemala, Quetzales", "51"),
            "GGP"=> array("Guernsey, Pounds", "a3"),
            "GYD"=> array("Guyana, Dollars", "24"),
            "HNL"=> array("Honduras, Lempiras", "4c"),
            "HKD"=> array("Hong Kong, Dollars", "24"),
            "HUF"=> array("Hungary, Forint", "46, 74"),
            "ISK"=> array("Iceland, Kronur", "6b, 72"),
            "INR"=> array("India, Rupees", "20a8"),
            "IDR"=> array("Indonesia, Rupiahs", "52, 70"),
            "IRR"=> array("Iran, Rials", "fdfc"),
            "IMP"=> array("Isle of Man, Pounds", "a3"),
            "ILS"=> array("Israel, New Shekels", "20aa"),
            "JMD"=> array("Jamaica, Dollars", "4a, 24"),
            "JPY"=> array("Japan, Yen", "a5"),
            "JEP"=> array("Jersey, Pounds", "a3"),
            "KZT"=> array("Kazakhstan, Tenge", "43b, 432"),
            "KES"=> array("Kenyan Shilling", "4b, 73, 68, 73"),
            "KGS"=> array("Kyrgyzstan, Soms", "43b, 432"),
            "LAK"=> array("Laos, Kips", "20ad"),
            "LVL"=> array("Latvia, Lati", "4c, 73"),
            "LBP"=> array("Lebanon, Pounds", "a3"),
            "LRD"=> array("Liberia, Dollars", "24"),
            "LTL"=> array("Lithuania, Litai", "4c, 74"),
            "MKD"=> array("Macedonia, Denars", "434, 435, 43d"),
            "MYR"=> array("Malaysia, Ringgits", "52, 4d"),
            "MUR"=> array("Mauritius, Rupees", "20a8"),
            "MXN"=> array("Mexico, Pesos", "24"),
            "MAD"=> array("Morocco, dirham", ""),
            "MNT"=> array("Mongolia, Tugriks", "20ae"),
            "MZN"=> array("Mozambique, Meticais", "4d, 54"),
            "NAD"=> array("Namibia, Dollars", "24"),
            "NPR"=> array("Nepal, Rupees", "20a8"),
            "ANG"=> array("Netherlands Antilles, Guilders (also called Florins)", "192"),
            "NZD"=> array("New Zealand, Dollars", "24"),
            "NIO"=> array("Nicaragua, Cordobas", "43, 24"),
            "NGN"=> array("Nigeria, Nairas", "20a6"),
            "KPW"=> array("North Korea, Won", "20a9"),
            "NOK"=> array("Norway, Krone", "6b, 72"),
            "OMR"=> array("Oman, Rials", "fdfc"),
            "PKR"=> array("Pakistan, Rupees", "20a8"),
            "PAB"=> array("Panama, Balboa", "42, 2f, 2e"),
            "PYG"=> array("Paraguay, Guarani", "47, 73"),
            "PEN"=> array("Peru, Nuevos Soles", "53, 2f, 2e"),
            "PHP"=> array("Philippines, Pesos", "50, 68, 70"),
            "PLN"=> array("Poland, Zlotych", "7a, 142"),
            "QAR"=> array("Qatar, Rials", "fdfc"),
            "RON"=> array("Romania, New Lei", "6c, 65, 69"),
            "RUB"=> array("Russia, Rubles", "440, 443, 431"),
            "SHP"=> array("Saint Helena, Pounds", "a3"),
            "SAR"=> array("Saudi Arabia, Riyals", "fdfc"),
            "RSD"=> array("Serbia, Dinars", "414, 438, 43d, 2e"),
            "SCR"=> array("Seychelles, Rupees", "20a8"),
            "SGD"=> array("Singapore, Dollars", "24"),
            "SBD"=> array("Solomon Islands, Dollars", "24"),
            "SOS"=> array("Somalia, Shillings", "53"),
            "ZAR"=> array("South Africa, Rand", "52"),
            "KRW"=> array("South Korea, Won", "20a9"),
            "LKR"=> array("Sri Lanka, Rupees", "20a8"),
            "SEK"=> array("Sweden, Kronor", "6b, 72"),
            "CHF"=> array("Switzerland, Francs", "43, 48, 46"),
            "SRD"=> array("Suriname, Dollars", "24"),
            "SYP"=> array("Syria, Pounds", "a3"),
            "TWD"=> array("Taiwan, New Dollars", "4e, 54, 24"),
            "THB"=> array("Thailand, Baht", "e3f"),
            "TTD"=> array("Trinidad and Tobago, Dollars", "54, 54, 24"),
            "TRY"=> array("Turkey, Lira", "54, 4c"),
            "TRL"=> array("Turkey, Liras", "20a4"),
            "TVD"=> array("Tuvalu, Dollars", "24"),
            "UAH"=> array("Ukraine, Hryvnia", "20b4"),
            "AED"=>array("United Arab Emirates, Dirham","62f, 2e, 625"),
            "GBP"=> array("United Kingdom, Pounds", "a3"),
            "USD"=> array("United States of America, Dollars", "24"),
            "UYU"=> array("Uruguay, Pesos", "24, 55"),
            "UZS"=> array("Uzbekistan, Sums", "43b, 432"),
            "VEF"=> array("Venezuela, Bolivares Fuertes", "42, 73"),
            "VND"=> array("Vietnam, Dong", "20ab"),
            "YER"=> array("Yemen, Rials", "fdfc"),
            "ZWD"=> array("Zimbabwe, Zimbabwe Dollars", "5a, 24"));

        return $currencies;
    }
}

if ( ! function_exists('get_currency_icon'))
{
    function get_currency_icon($currency = null)
    {
        $currencies = get_all_currencies();
        $currencySymbol = '';

        if($currency == null) {
            return 'N/A';
        }

        $symbol = $currencies[$currency][1];
        if($symbol=='')
            return $currency;
        $symbols = explode(', ', $symbol);
        if(is_array($symbols)) {
            $symbol = "";
            foreach($symbols as $temp) {
                $symbol .= '&#x'.$temp.';';
            }
        }
        else {
            $symbol = '&#x'.$symbol.';';
        }

        return $symbol;
    }
}


if ( ! function_exists('show_price'))
{
    function show_price ($price)
    {

        $CI = get_instance();
        $CI->config->load('bookkeeping');
        $decimal_point = ($CI->config->item('decimal_point')!='')?$CI->config->item('decimal_point'):'.';
        $thousand_separator = ($CI->config->item('thousand_separator')!='')?$CI->config->item('thousand_separator'):',';
        $currency_placing = $CI->session->userdata('currency_placing');
        $system_currency = get_currency_icon($CI->session->userdata('system_currency'));



        if($currency_placing=='before_with_no_gap')
        {
            return $system_currency.''.number_format($price, 2, $decimal_point, $thousand_separator);
        }
        else if($currency_placing=='before_with_gap')
        {
            return $system_currency.' '.number_format($price, 2, $decimal_point, $thousand_separator);
        }
        else if($currency_placing=='after_with_no_gap')
        {
            return number_format($price, 2, $decimal_point, $thousand_separator).''.$system_currency;
        }
        else
        {
            return number_format($price, 2, $decimal_point, $thousand_separator).' '.$system_currency;
        }
    }
}

if ( ! function_exists('get_financial_account_balance'))
{
    function get_financial_account_balance ($account_id)
    {
        if($account_id==0)
            return '';

        $CI = get_instance();
        $CI->load->database();

        $CI->db->select_sum('amount');
        $query =  $CI->db->get_where('income',array('account_id'=>$account_id));
        $income = $query->result();

        $CI->db->select_sum('amount');
        $query =  $CI->db->get_where('sale',array('account_id'=>$account_id));
        $sale = $query->result();

        $total_income =  $income[0]->amount + $sale[0]->amount;

        $CI->db->select_sum('amount');
        $query =  $CI->db->get_where('purchase',array('account_id'=>$account_id));
        $purchase = $query->result();



        $CI->db->select_sum('amount');
        $query =  $CI->db->get_where('expense',array('account_id'=>$account_id));
        $expense = $query->result();

        $total_expense =  $expense[0]->amount + $purchase[0]->amount;


        return ($total_income - $total_expense);

    }
}



/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */