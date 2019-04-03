
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
 
    <script type="text/javascript">
        
        $("document").ready(function(){
         
                
            $("#button1").bind("click", function(event){

                 $("#messageShow").hide ();
                 var name = $("#Username").val ();
                 var email = $("#email").val ();
                 var Text1 = $("#Text1").val ();
                 var message = $("#CreatedAt").val ();
                
                 var fail = "";
                 if (name.length < 3) { 
                 fail = "Имя менее 3 символов";
                 } else if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0) {
                  fail = "Вы ввели неоректный E-mail";
                  } else if (Text1.length < 5) {
                   fail = "Текст сообщения меньше 5 символов";
                      }
                 if (fail != "") {
                  $('#messageShow').html (fail + "<div class='clear'><br></div>");
                  $('#messageShow').show ();
                  return false;
                 }
                
                var dannie = $("form").serialize(); 
                $.ajax({
                    url: 'insert.php',
                    type: 'POST',
                    data: dannie,

                    success: function(data) {
                        if (data) {
                            alert(data);
                            window.location.href="index.php";
                        }else 
                            alert("Ошибка");
                     }
                });

            });

        });
         

        $("document").ready(function(){
            
            $('#example').DataTable({
                        
                        "autoWidth": false,
                         "order": [[ 5, "desc" ]], 
                         "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                                    },       
                        "aoColumns": [
                            { "sWidth": "5%"}, // 1st column width 
                            { "sWidth": "5%" }, // 2nd column width 
                            { "sWidth": "5%" }, // 3rd column width
                            { "sWidth": "15%" }, // 5th column width 
                            { "sWidth": "65%" }, // 4th column width 
                            { "sWidth": "5%" } // 5th column width 
                           
                            ], 
                        "serverSide": true,
                        
                        "ajax":{
                            
                            url:"fetch.php",
                            type:"post"

                        },

                        
            });

        });
          
 
          
        
       
       
          
       
    </script>
</head>
<body>


    <div class="container col-sm-3">
         <h2> Форма добавления записи</h2><br><br>
       <form name='check' action='index.php' method='post'>
    <div class="form-group">
        <label for="Username">Username*:</label><br/>
        <input class="form-control" type="text" name="Username" id="Username" placeholder="Введите Username ">
    </div>
    <div class="form-group">
        <label for="email">Email*:</label><br/>
        <input class="form-control" type="text" name="email" id="email" placeholder="Введите Email ">
    </div>
    <div class="form-group">
        <label for="Homepage">Homepage:</label><br/>
        <input class="form-control" type="text" name="Homepage" id="Homepage" placeholder="Введите Homepage ">
    </div>
    <div class="form-group">
        <label>Text*:</label><br/>
        <textarea class="form-control" name="text1"  id="Text1" placeholder="Введите text " ></textarea>
    </div>
        
        <input type="hidden" name="CreatedAt" id="CreatedAt" value="<?php echo date("y-m-d H:i:s"); ?>">
    

    
       
        
        
    
    
    <div class="text-danger" id="messageShow"></div>


     <div class="form-group">
        Проверочный код*: <input class="form-control"  type='text' name='captcha' placeholder="CAPTCHA " />
    </div>
        
    <p>
        <img src='captcha.php' alt='' />
    </p>
    <p>
        <input class="btn btn-success" type='submit' id="button1"  value='Отправить' />
    </p>
    <p><a href="Faker.php">Заполнить таблицу</a></p>
    <p><a class="text-danger" href="Clean.php">Очистить таблицы</a></p>
</form>
    </div>
    <div class="container col-sm-9">
        <h1>Гостевая книга</h1>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>emeil</th>
                <th>Homepage</th>
                <th>Text1</th>
                <th>CreatedAt</th>
                
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>emeil</th>
                <th>Homepage</th>
                <th>Text1</th>
                <th>CreatedAt</th>
                
            </tr>
            </tfoot>
        </table>

       
    </div>




    
      
   
</body>
</html>

 