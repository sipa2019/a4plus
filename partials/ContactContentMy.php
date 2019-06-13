<header>
 <section id="intro">
</section>
</header>  
    <!-- Page Content -->
  <div class="container mt-3">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        <small>Contact</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>


      <div class="row mb-5">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
         <h3> <span class="fa-stack fa-lg">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa fa-envelope-o fa-stack-1x"></i>
          </span>Отправить сообщение</h3>

          
            <form name="sentMessage" id="contactForm" role="form" method="POST" action="partials/o404pageMy.php">
            <div class="control-group form-group">
              <div class="controls">
                <label>Имя:<span class="color-red">*</span></label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." required>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Телефон:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email:<span class="color-red">*</span></label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." required>
              </div>
            </div>
             <div class="control-group form-group">
              <div class="controls">
                <label>Название компании:<span class="color-red">*</span></label>
                <input type="text" class="form-control" id="company" required data-validation-required-message="Please enter your Company." required>
              </div>
            </div>
            
            <div class="control-group form-group">
              <div class="controls">
                <label>Должность:<span class="color-red">*</span></label>
                <input type="text" class="form-control" id="dolz" required data-validation-required-message="Please enter your Dolznost." required>
              </div>
            </div>
            
            <div class="control-group form-group">
              <div class="controls">
                <label>Сообщение:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            
           
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-success" id="sendMessageButton">Отправить &raquo;</button>
          </form>
            

 			<div class="mt-5">
            
               <span  style="color:#F00;">* </span>- поля обязательные к заполнению
            
            </div>


         
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3 class="mb-5">
          <span class="fa-stack fa-lg">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-handshake-o fa-stack-1x"></i>
          </span>
         Контакты
          </h3>


          <p class="mb-5">
               <i class="fa fa-phone-square" style="font-size:36px;color:red"></i>
               (xxx) 46456-797898
          </p>
          
          <p class="mb-5">
            <i class="fa  fa-envelope-square" style="font-size:36px"></i>
            <a href="mailto:name@example.com">orieco@example.com
            </a>
          </p>
          <p>
          <i class="fa fa-clock-o " style="font-size:36px"></i> Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row --> 	
<div class="mb-5" style="height:50px;"></div>
    </div>
    <!-- /.container -->