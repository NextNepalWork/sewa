<body>
    @php
        $esewa=\App\BusinessSetting::where('type','esewa_payment')->where('value',1)->first();
    @endphp

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php

    define ('HMAC_SHA256', 'sha256');
    define ('SECRET_KEY', '987d0a887554469d91f7250cc54aee72ca287c62f9b7449b99efab2a57a939e7a3bc470f59574ee784fee9455f6ddd3327d8ca2085b049da8f4899b7cb193c357517d02fc23942718239d8b54c01089be600aac7196343a6bc6ff2157ee6376ab92f9c351cdf46799bac098c6b59dc2e74908dd5e21b4f4faca456ce9bd86510');
    
    function sign ($params) {
      return signData(buildDataToSign($params), SECRET_KEY);
    }
    
    function signData($data, $secretKey) {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }
    
    function buildDataToSign($params) {
            $signedFieldNames = explode(",",$params["signed_field_names"]);
            foreach ($signedFieldNames as $field) {
               $dataToSign[] = $field . "=" . $params[$field];
            }
            return commaSeparate($dataToSign);
    }
    
    function commaSeparate ($dataToSign) {
        return implode(",",$dataToSign);
    }
    
    $params = [
      'access_key' => 'cd7ac9c06b2b3bc8915cb8c08d2e2a93',
      'profile_id' => 'AC9E8149-F889-4C78-893B-EAF207B3C7AC',
      'transaction_uuid' => uniqid(),
      'signed_field_names' => 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency',
      'unsigned_field_names' => '',
      'signed_date_time' => gmdate("Y-m-d\TH:i:s\Z"),
      'locale' => 'en',
      'auth_trans_ref_no' => '',
      'bill_to_forename' => 'Rajim',
      'bill_to_surname' => 'Ali',
      'bill_to_email' => 'ali.rajim12@gmail.com',
      'bill_to_phone' => '9849428177',
      'bill_to_address_line1' => 'Kathmandu',
      'bill_to_address_city' => 'Kathmandu',
      'bill_to_address_state' => 'Kathmandu',
      'bill_to_address_country' => 'NP',
      'bill_to_address_postal_code' => 'Kathmandu',
      'bill_address1' => 'Nepal',
      'bill_city' => 'kathmandu',
      'bill_country' => 'nepal',
      'customer_email' => 'joshibipin2052@gmail.com',
      'customer_lastname' => 'joshi',
      'transaction_type' => 'sale',
      'reference_number' =>  date('Y-m-dh:i'),
      // 'amount' => $ordercode->grand_total,
      'amount' => '100',
      'currency' => 'NPR',
      'submit' => ''
    ];
    // dd($params);

    ?>
    
    <form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="post"><br/>
      access_key : <input type="hidden1" name="access_key" value="cd7ac9c06b2b3bc8915cb8c08d2e2a93"><br/>
      profile_id : <input type="hidden1" name="profile_id" value="AC9E8149-F889-4C78-893B-EAF207B3C7AC"><br/>
      transaction_uuid : <input type="hidden1" name="transaction_uuid" value="<?php echo uniqid() ?>"><br/>
      signed_field_names : <input type="hidden1" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency"><br/>
      unsigned_field_names : <input type="hidden1" name="unsigned_field_names"><br/>
      signed_date_time : <input type="hidden1" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>"><br/>
      locale : <input type="hidden1" name="locale" value="en"><br/>
  
      auth_trans_ref_no : <input type="hidden1" name="auth_trans_ref_no"><br/>
      bill_to_forename : <input type="hidden1" name="bill_to_forename" value="Rajim"><br/>
      bill_to_surname : <input type="hidden1" name="bill_to_surname" value="Ali"><br/>
      bill_to_email : <input type="hidden1" name="bill_to_email" value="ali.rajim12@gmail.com"><br/>
      bill_to_phone : <input type="hidden1" name="bill_to_phone" value="9849428177"><br/>
      bill_to_address_line1 : <input type="hidden1" name="bill_to_address_line1" value="Kathmandu"><br/>
      bill_to_address_city : <input type="hidden1" name="bill_to_address_city" value="Kathmandu"><br/>
      bill_to_address_state : <input type="hidden1" name="bill_to_address_state" value="Kathmandu"><br/>
      bill_to_address_country : <input type="hidden1" name="bill_to_address_country" value="NP"><br/>
      bill_to_address_postal_code : <input type="hidden1" name="bill_to_address_postal_code" value="Kathmandu"><br/>
      bill_to_address_postal_code : <input type="hidden1" name="bill_to_address_postal_code" value="Kathmandu"><br/>

      signature:<input type="hidden1" id="signature" name="signature" value="{{sign($params)}}"><br/>

      bill_address1 :<input type="text" name="bill_address1" value="Nepal"> <br>
      bill_city :<input type="text" name="bill_city" value="kathmandu"> <br>
      bill_country <input type="text" name="bill_country" value="nepal"> <br>
      customer_email <input type="text" name="customer_email" value="joshibipin2052@gmail.com"> <br>
      customer_lastname :<input type="text" name="customer_lastname" value="joshi"> <br>


      transaction_type : <input type="text" name="transaction_type" size="25" value="sale" ><br/>
      reference_number : <input type="text" name="reference_number" size="25" value="<?php echo date('Y-m-dh:i');?>"><br/>
      amount : <input type="text" name="amount" size="25" value="100"><br/>
      {{-- {{$ordercode->grand_total}} --}}
      currency : <input type="text" name="currency" size="25" value="NPR"><br/>
      <input type="submit" id="submit" name="submit" value="Submit"/>
      {{-- 9Jt/ShDl3KGGwnwvK7rw2FNmNaFde6fm5/MjZ7lFBuc= --}}
      {{-- <button type="submit" class="submitnic"></button> --}}

      
  </form>

  {{-- <script type="text/javascript" src="payment_form.js"></script> --}}
    <script>
      $(function () {
          payment_form = $('form').attr('id');
          addLinkToSetDefaults();
      });


      function setDefaultsForAll() {
          if (payment_form === "payment_confirmation"){
            setDefaultsForUnsignedDetailsSection();
          }
          else {
            setDefaultsForPaymentDetailsSection();
        } 
      }

      function addLinkToSetDefaults() {
          $(".section").prev().each(function (i) {
              legendText = $(this).text();
              $(this).text("");

              var setDefaultMethod = "setDefaultsFor" + capitalize($(this).next().attr("id")) + "()";

              newlink = $(document.createElement("a"));
              newlink.attr({
                  id:'link-' + i, name:'link' + i, href:'#'
              });
              newlink.append(document.createTextNode(legendText));
              newlink.bind('click', function () {
                  eval(setDefaultMethod);
              });

              $(this).append(newlink);
          });

          newbutton = $(document.createElement("input"));
          newbutton.attr({
              id:'defaultAll', value:'Default All', type:'button', onClick:'setDefaultsForAll()'
          });
          newbutton.bind('click', function() {
              setDefaultsForAll;
          });
          $("#"+payment_form).append(newbutton);
      }

    function capitalize(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function setDefaultsForPaymentDetailsSection() {
        $("input[name='transaction_type']").val("authorization");
        $("input[name='reference_number']").val(new Date().getTime());
        $("input[name='amount']").val("100.00");
        $("input[name='currency']").val("USD");
    }

    function setDefaultsForUnsignedDetailsSection(){
        $("input[name='card_type']").val("001");
        $("input[name='card_number']").val("4242424242424242");
        $("input[name='card_expiry_date']").val("11-2020");
    }



      // $('.submitnic').trigger('click');    
    </script>
    
  </body>