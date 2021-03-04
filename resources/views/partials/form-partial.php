<script src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.min.js"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.23568" type="text/javascript"></script>
<script src="https://js.jotform.com/vendor/postMessage.js?3.3.23568" type="text/javascript"></script>
<script src="https://js.jotform.com/WidgetsServer.js?v=1614550857878" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.setConditions([{"action":[{"id":"action_1581690116457","visibility":"Hide","isError":false,"field":"10"}],"id":"1581690133174","index":"0","link":"Any","priority":"0","terms":[{"id":"term_1581690116457","field":"17","operator":"isEmpty","value":"","isError":false}],"type":"field"},{"action":[{"id":"action_0_1581690045611","visibility":"Hide","isError":false,"field":"10"}],"id":"1581689801697","index":"1","link":"Any","priority":"1","terms":[{"id":"term_0_1581690045611","field":"17","operator":"equals","value":"Yes","isError":false}],"type":"field"},{"action":[{"field":"11","visibility":"Show","id":"action_1_1581689802691"}],"id":"1581689543679","index":"2","link":"Any","priority":"2","terms":[{"field":"15","operator":"equals","value":"Yes"}],"type":"field"},{"action":[{"field":"18","visibility":"Show","id":"action_0_1581945983644","isError":false}],"id":"1581689543680","index":"3","link":"Any","priority":"3","terms":[{"field":"15","operator":"equals","value":"Yes","id":"term_0_1581945983644","isError":false}],"type":"field"},{"action":[{"field":"10","visibility":"Show","id":"action_3_1581689802691"}],"id":"1581689543681","index":"4","link":"Any","priority":"4","terms":[{"field":"15","operator":"equals","value":"Yes"}],"type":"field"}]);
	JotForm.init(function(){
      setTimeout(function() {
          $('input_3').hint('ex: myname@example.com');
       }, 20);
if (window.JotForm && JotForm.accessible) $('input_14').setAttribute('tabindex',0);
      productID = {"0":"input_15_1012","1":"input_15_1014","3":"input_15_1010","4":"input_15_1007","5":"input_15_1006","6":"input_15_1008","7":"input_15_1005","8":"input_15_1003","9":"input_15_1015","10":"input_15_1002","11":"input_15_1018","12":"input_15_1017","13":"input_15_1016","14":"input_15_1009"};
      paymentType = "product";
      JotForm.setCurrencyFormat('USD',true, 'point');
      JotForm.totalCounter({"input_15_1012":{"price":"0.25","quantityField":"input_15_quantity_1012_0"},"input_15_1014":{"price":"0.50","quantityField":"input_15_quantity_1014_0"},"input_15_1010":{"price":"0.50","quantityField":"input_15_quantity_1010_0"},"input_15_1007":{"price":"0.50","quantityField":"input_15_quantity_1007_0"},"input_15_1006":{"price":"1.00","quantityField":"input_15_quantity_1006_0"},"input_15_1008":{"price":"1.00","quantityField":"input_15_quantity_1008_0"},"input_15_1005":{"price":"0.80","quantityField":"input_15_quantity_1005_0"},"input_15_1003":{"price":"0.80","quantityField":"input_15_quantity_1003_0"},"input_15_1015":{"price":"1.00","quantityField":"input_15_quantity_1015_0"},"input_15_1002":{"price":"0.50","quantityField":"input_15_quantity_1002_0"},"input_15_1018":{"price":"1.00","quantityField":"input_15_quantity_1018_0"},"input_15_1017":{"price":"0.50","quantityField":"input_15_quantity_1017_0"},"input_15_1016":{"price":"1.00","quantityField":"input_15_quantity_1016_0"},"input_15_1009":{"price":"1.00","quantityField":"input_15_quantity_1009_0"}});
      $$('.form-product-custom_quantity').each(function(el, i){el.observe('blur', function(){isNaN(this.value) || this.value < 1 ? this.value = '0' : this.value = parseInt(this.value)})});
      $$('.form-product-custom_quantity').each(function(el, i){el.observe('focus', function(){this.value == 0 ? this.value = '' : this.value})});
      JotForm.handleProductLightbox();
	JotForm.newDefaultTheme = false;
	JotForm.extendsNewTheme = false;
	JotForm.newPaymentUIForNewCreatedForms = false;
      JotForm.alterTexts(undefined, true);
      FormTranslation.init({"detectUserLanguage":"1","firstPageOnly":"0","options":"Español","originalLanguage":"es","primaryLanguage":"es","saveUserLanguage":"1","showStatus":"flag-with-nation","theme":"light-theme","version":"2"});
    /*INIT-END*/
	});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"clickTo","qid":"1","text":"Product Order Form","type":"control_head"},{"name":"nombreCompleto","qid":"2","text":"NOMBRE COMPLETO","type":"control_fullname"},{"name":"correoElectronico","qid":"3","text":"CORREO ELECTRONICO ","type":"control_email"},{"name":"direccionCompleta","qid":"4","text":"DIRECCION COMPLETA","type":"control_address"},{"name":"numeroCelular","qid":"5","text":"NUMERO CELULAR ","type":"control_phone"},null,null,null,null,null,null,null,null,{"name":"comentarios","qid":"14","text":"COMENTARIOS ","type":"control_textarea"},{"name":"misProductos","qid":"15","text":"Mis Productos","type":"control_payment"},{"name":"comprobanteDe","qid":"16","text":"Comprobante de Pago ","type":"control_widget"},{"name":"pagosBancarios","qid":"17","text":"PAGOS BANCARIOS","type":"control_head"},null,{"name":"escribaUna19","qid":"19","text":"Detected Location","type":"control_widget"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"clickTo","qid":"1","text":"Product Order Form","type":"control_head"},{"name":"nombreCompleto","qid":"2","text":"NOMBRE COMPLETO","type":"control_fullname"},{"name":"correoElectronico","qid":"3","text":"CORREO ELECTRONICO ","type":"control_email"},{"name":"direccionCompleta","qid":"4","text":"DIRECCION COMPLETA","type":"control_address"},{"name":"numeroCelular","qid":"5","text":"NUMERO CELULAR ","type":"control_phone"},null,null,null,null,null,null,null,null,{"name":"comentarios","qid":"14","text":"COMENTARIOS ","type":"control_textarea"},{"name":"misProductos","qid":"15","text":"Mis Productos","type":"control_payment"},{"name":"comprobanteDe","qid":"16","text":"Comprobante de Pago ","type":"control_widget"},{"name":"pagosBancarios","qid":"17","text":"PAGOS BANCARIOS","type":"control_head"},null,{"name":"escribaUna19","qid":"19","text":"Detected Location","type":"control_widget"}]);}, 20); 
</script>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.23568" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.23568" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.23568" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=5f6c4c83346ec05354558fe8"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/payment/payment_feature.css?3.3.23568" />
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px;
    }
    .form-all{
        width:690px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: false;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
/*PREFERENCES STYLE*/
    .form-all {
      font-family: Lucida Grande, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Lucida Grande, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Lucida Grande, sans-serif;
    }
    .form-header-group {
      font-family: Lucida Grande, sans-serif;
    }
    .form-label {
      font-family: Lucida Grande, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: block;
    float: none;
    text-align: left;
    width: 100%;
  
    }
  
    .form-line {
      margin-top: 12px 36px 12px 36px px;
      margin-bottom: 12px 36px 12px 36px px;
    }
  
    .form-all {
      max-width: 690px;
      width: 100%;
    }
  
    .form-label.form-label-left,
    .form-label.form-label-right,
    .form-label.form-label-left.form-label-auto,
    .form-label.form-label-right.form-label-auto {
      width: 150px;
    }
  
    .form-all {
      font-size: 14px
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 14px
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 14px
    }
  
    .supernova .form-all, .form-all {
      background-color: #fff;
    }
  
    .form-all {
      color: #555;
    }
    .form-header-group .form-header {
      color: #555;
    }
    .form-header-group .form-subHeader {
      color: #555;
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
      color: #555;
    }
    .form-sub-label {
      color: #6f6f6f;
    }
  
    .supernova {
      background-color: undefined;
    }
    .supernova body {
      background: transparent;
    }
  
    .form-textbox,
    .form-textarea,
    .form-dropdown,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: undefined;
    }
  
    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }
  
    .form-all {
      background-image: none;
    }
  
  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }
  
  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/.form-label.form-label-auto {
        
      display: block;
      float: none;
      text-align: left;
      width: 100%;
    
      }
    /* Injected CSS Code */
</style>
