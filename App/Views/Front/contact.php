<?php
   include('./App/Views/Front/Layout/head.php') ;
   include('./App/Views/Front/Layout/header.php') ;
?>


<h5 class="text-center my-5">Une question, une recommandation, un échange, vous avez la parole !</h5>

<div class="mt-5 text-center font-italic font-bold message">
   <?php
      if (!empty($message)) {
         echo $message;
      } 
   ?>
</div>
<!-- contact form -->
<form action="index.php?action=contact" method="post" role="form">

   <!-- lastname -->
   <div class="form-group">
      <label for="lastNameFormContact">Nom</label>
      <input type="text" class="form-control col-6" id="lastNameFormContact" name="lastName"
         placeholder="Indiquer votre nom">
   </div>

   <!-- firstname -->
   <div class="form-group">
      <label for="firstNameFormContact">Prénom</label>
      <input type="text" class="form-control col-6" id="firstNameFormContact" name="firstName"
         placeholder="Indiquer votre prénom">
   </div>

   <!-- email -->
   <div class="form-group">
      <label for="emailFormContact">Email</label>
      <input type="email" class="form-control col-8" id="emailFormContact" name="email"
         placeholder="name@example.com">
   </div>

   <!-- topic -->
   <div class="form-group">
      <label for="topicFormContact">Sujet</label>
      <input type="text" class="form-control col-10" id="topicFormContact" name="topic"
         placeholder="Indiquer le sujet du message">
   </div>

   <!-- message -->
   <div class="form-group">
      <label for="messageFormContact">Message</label>
      <textarea class="form-control col-10" id="messageFormContact" name='message'
         placeholder="Indiquer votre message" rows="3"></textarea>
   </div>

   <!-- submit -->
   <div class="text-center mt-5">
      <button type="submit" class="btn">Envoyer</button>
   </div>
</form>

<!-- go top -->
<a title="Remonter en haut de la page" href="index.php?action=contact">
   <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
</a>

<?php 
   include('./App/Views/Front/Layout/footer.php') ;
?>