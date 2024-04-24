<form action="" method="post" class="verify_token_form">

    <div class="code_form_feeds"></div>

    <input type="hidden" name="mail" value="<?php echo $_POST['mail'] ?>">
    <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" placeholder="123345" name="code_token" required>
    <label for="floatingInput">Enter verification code send to your mail (******)</label>
    </div>

    <div class="my-3">
    <button class="btn btn-secondary w-100" type="submit">Proceed</button>     
    </div>



</form>

<script>
      $('.verify_token_form').submit(function(e){
    e.preventDefault(); 
    let postData =  $(this).serialize();

  $.post("async/verify_token.php",postData,function(data){
    $('.code_form_feeds').html(data);
  })
  })
</script>