<?php
/*
Plugin Name: AQS Barcode Generation
Version: 1.0
Description: This tool is help you to make a QRCode easily on Wordpress site
Author: anhhai680
Author URI: http://anhhai680.com
*/
function aqsbarcode_script(){
	wp_register_style( 'aqs-barcodestyle', plugins_url('aqs-barcodestyle.css',__FILE__));
	wp_enqueue_script( 'custom-js', plugins_url('aqs-custom.js',__FILE__));
}    
add_action( 'init', 'aqsbarcode_script' );

function aqsbarcode_shortcodes_init(){
	function aqsbarcode_shortcode($atts = [], $content = null){
		?>
		
		<div class="row">
			<table class="table" cellpadding="2" cellspacing="2">
					<tr>
						<td><label class="control-label">Số hiệu chứng chỉ</label></td>
						<td><input id="txtCertificateNumber" type="text" maxlength="20" placeholder="Nhập số hiệu chứng chỉ" class="form-control" /></td>
						<td><input id="btnCheckCode" type="button" value="Kiểm tra" class="btn-checkqr" onclick="return checkExistSN();" /></td>
					</tr>
				</table>
		</div>
		
		<div class="row">
			<table id="tbResult" class="table" cellpadding="2" cellspacing="2">
				<thead>
					<tr>
						<th scope="col">Số hiệu chứng chỉ</th>
						<th scope="col">Tên công ty</th>
						<th scope="col">Ngày cấp</th>
						<th scope="col">Tình trạng hiệu lực</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<?php
		// always return
        return $content;
	}
	add_shortcode('aqsbarcode', 'aqsbarcode_shortcode');
}
add_action('init', 'aqsbarcode_shortcodes_init');

?>