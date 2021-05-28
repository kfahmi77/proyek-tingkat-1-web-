<HTML>

<head>
  <title>Whatsapp Form Widget by www.idblanter.com</title>
  <link rel="stylesheet" href="css.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

  <form class="whatsapp-form">
    <div class="datainput">
      <input class="validate" id="wa_name" name="name" required="" type="text" value='' />
      <span class="highlight"></span><span class="bar"></span>
      <label>Your Name</label>
    </div>
    <div class="datainput">
      <input class="validate" id="wa_email" name="email" required="" type="email" value='' />
      <span class="highlight"></span><span class="bar"></span>
      <label>Email Address</label>
    </div>
    <div class="datainput">
      <select id="wa_select">
        <option hidden='hidden' selected='selected' value='default'>Select Option</option>
        <option value="1">List Option 1</option>
        <option value="2">List Option 2</option>
        <option value="3">List Option 3</option>
      </select>
    </div>
    <div class="datainput">
      <input class="validate" id="wa_number" name="count" required="" type="number" value='' />
      <span class="highlight"></span><span class="bar"></span>
      <label>Input Number</label>
    </div>
    <div class="datainput">
      <input class="validate" id="wa_url" name="url" required="" type="url" value='' />
      <span class="highlight"></span><span class="bar"></span>
      <label>URL/Link</label>
      <p>Link blog Anda, gunakan http:// atau https://</p>
    </div>
    <div class="datainput">
      <textarea id='wa_textarea' placeholder='' maxlength='5000' row='1' required=""></textarea>
      <span class="highlight"></span><span class="bar"></span>
      <label>Description</label>
    </div>
    <a class="send_form" href="javascript:void" type="submit" title="Send to Whatsapp">Send to Whatsapp</a>
    <div id="text-info"></div>
  </form>

  <div class='none'>Design by Dunia Blanter</div>
  <div class='none'>Design by www.idblanter.com</div>
  <div class='none'>Design by www.blantertheme.com</div>
  <div class='none'>Rio Ilham Hadi - Rhinokage Rio (about.idblanter.com)</div>
</body>
<script>
  $(document).on('click', '.send_form', function() {
    var input_blanter = document.getElementById('wa_email');

    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
      phone = '62895345860230',
      walink2 = 'Halo saya ingin ',
      text_yes = 'Terkirim.',
      text_no = 'Isi semua Formulir lalu klik Send.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      var walink = 'whatsapp://send';
    }

    if ("" != input_blanter.value) {

      /* Call Input Form */
      var input_select1 = $("#wa_select :selected").text(),
        input_name1 = $("#wa_name").val(),
        input_email1 = $("#wa_email").val(),
        input_number1 = $("#wa_number").val(),
        input_url1 = $("#wa_url").val(),
        input_textarea1 = $("#wa_textarea").val();

      /* Final Whatsapp URL */
      var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
        '*Name* : ' + input_name1 + '%0A' +
        '*Email Address* : ' + input_email1 + '%0A' +
        '*Select Option* : ' + input_select1 + '%0A' +
        '*Input Number* : ' + input_number1 + '%0A' +
        '*URL/Link* : ' + input_url1 + '%0A' +
        '*Description* : ' + input_textarea1 + '%0A';

      /* Whatsapp Window Open */
      window.open(blanter_whatsapp, '_blank');
      document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
    } else {
      document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
    }
  });
</script>

</HTML>