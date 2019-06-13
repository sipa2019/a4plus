<div class="container-fluid">
      <div class="d-flex justify-content-between">
        <div class="pl-5 bd-highlight">
				<img src="../assets/img/logo/LogoOrieco.png" class="img-fluid">
        </div>

	  <div class="pr-5 bd-highlight">
  			<a class="pb-5 pr-2 pl-4"  href="index.php?lang=ru" id='rus'>RUS</a>
            <a class="pt-4 pr-2 pl-2" href="index.php?lang=en" id='eng'>ENG</a>
            
  			  <div class="clearfix"></div>
              
			 <ul class="nav navbar-nav flex-row justify-content-between">
             
                <li class="dropdown order-1">
                      <a href="#" data-toggle="modal" data-target="#modalPassword"> Login/Registration &raquo;</a>
  				</li>
			</ul>                  
                     
                
     </div>
    </div>
</div> <!-- container-fluid/ -->


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light d-flex align-items-start">
      <div class="container">
        <a class="navbar-brand" href="index.html"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        
          <ul class="navbar-nav ml-auto"> 
            <li class="nav-item">
              <a class="nav-link"  href="index.php">Главная</a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link"  href="ocompanyMy.php">О нас</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link"  href="ouslugiMy.php">Услуги</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link"  href="oprojectMy.php">Проекты</a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="oinnovaciiMy.php">Инновации</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link"  href="ogaleryMy.php">Галерея</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="ocontactMy.php">Контакты</a>
            </li>
           

          </ul>
        </div>
      </div>
    </nav>

    


<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                    <div class="modal-header " >
                        <span ><h3  >Регистрация</h3></span>
                        <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
            
     <div class="container">
        <div class="row mb-5 " >
  				<div class="col-lg-6 mb-6" >    
                        <form class="form-horizontal" role="form" method="POST" action="partials/o404pageMy.php">
                            <div class="row mr-3">
                                 <div class="col-md-12">
                                            <div class="form-group">
                                                       <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                             </div>
                                                         <input type="text" name="email" class="form-control" id="email"
                                                           placeholder="email" required autofocus>
                                                </div>
                                    </div>
                               </div> 
                             
                            <div class="row mr-3">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            </div>
                                                   <input type="password" name="password-confirmation" class="form-control"
                                                   id="password-confirm" placeholder="Пароль" required>
                                        </div>
                                    </div>
                                </div>
                                
                             <div class="row mr-3">
                                <div class="col-md-12">
                                        <div class="form-group">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                
                                                    
                                                </div>
                                                       <input type="password" name="password-confirmation" class="form-control"
                                                       id="password-confirm" placeholder="Повторите пароль" required>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row mr-3">
                                    
                                        <button type="submit" class="btn btn-success btn-block">Oтправить &raquo;</button>
                                   
                                </div>
                        </form> 
                        
                        		<div class="row mt-5 mr-3">
                                   
                                        <span >У меня уже есть аккаунт  <a href="#" class="read-bold" id="lognV">Войти </a></span>
                                       		<div class="col-md-12" id="logO">

                                                <form class="form" role="form">
                                                    <div class="form-group">
                                                        <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required>
                                                    </div>
                                                <div class="form-group">
                                                    <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-block">Oтправить &raquo;</button>
                                                </div>
                                                
                                
                           					 </form>  
                                                
                                            
                                            
                                            </div>	<!-- end logO -->
                               	    </div>
                    			</div> <!--1 "col-lg-6 mb-6--> 
      
              <div class="col-lg-6 mb-6 cont-left-bourder" > 
             
                                     <div class="row ml-3">
                                 <div class="col-md-12">
                                            <div class="form-group">
                                                       <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                             </div>
                                                         <button type="button" class="btn btn-primary btn-block ">Войти через Facebook</button>  
                                                </div>
                                    </div>
                               </div> 
                             
                            <div class="row ml-3">
                                
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            </div>
                                                  <button type="button" class="btn btn-danger btn-block">Войти через Google+</button>  
                                        </div>
                                    </div>
                                </div>
             
             
              </div>   <!--2 "col-lg-6 mb-6-->    
            
            
    </div>  <!--- row -->         
            
            
   </div> <!-- container -->         
            
            
            
            
            
            
            
            
            
            
            <!--<div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success">Отправить &raquo;</button>
            </div>-->
        </div>
    </div>
</div>


