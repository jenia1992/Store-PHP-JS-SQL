<?php require('session.php');?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <button class="btn btn-danger mr-5" onclick="logout()">Logout</button>
      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">

      </button>

     

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link btn" onclick="load_customers()">

            <span>Customers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" onclick="load_products()">

            <span>Inventory</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" onclick="load_orders()">

            <span>Orders</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item" id="addBtn">
              <!-- here will be the add btn -->
            </li>
          </ol>

  

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header" id="response">

              Data Table Example</div>
            <div class="card-body">
              <div id="myTable" class="table-responsive">
                <!-- here will be the tables from the db -->
              </div>
            </div>
        
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    


  </body>
  
  <script>
      var customer;
      var product;
    $(document).ready(function(){
        load_customers();
    });
      
      
    function load_customers(){
        $.ajax({
            url: 'customers/load_customers.php'
        }).done(function(data){
            $('#myTable').html(data);
            var addBtn = '<button onclick="add_customer_form()">Add</button>';
            $('#addBtn').html(addBtn);
        });
    }
    
    function load_products(){
        $.ajax({
            url: 'inventory/load_products.php'
        }).done(function(data){
            $('#myTable').html(data);
            var addBtn = '<button onclick="add_product_form()">Add</button>';
            $('#addBtn').html(addBtn);
        });
    }
      
    function load_orders(){
        $.ajax({
            url: 'orders/load_orders.php'
        }).done(function(data){
            $('#myTable').html(data);
            var addBtn = '<button onclick="add_order_form()">Add</button>';
            $('#addBtn').html(addBtn);
        });
    }
      
    function remove_customer(id){
        $.ajax({
            url: 'customers/remove_customer.php',
            data: {id:id},
            method: 'POST'    
        }).done(function(data){
            $('#response').html(data);
            load_customers();
        })
    }
      
    function remove_product(productId){
        $.ajax({
            url: 'inventory/remove_product.php',
            data: {productId:productId},
            method: 'POST'    
        }).done(function(data){
            $('#response').html(data);
            load_products();
        })
    }
      
    function load_customer_by_id(id){
        return $.ajax({
            url: 'customers/load_customer_by_id.php',
            method: 'POST',
            data: {id:id},
            dataType: 'json'
        }).done(function(data){
            customer = data;
        })
    }
      
    function customer_form(){
        return $.ajax({
            url:'customers/customer_form.php'
        }).done(function(data){
            $('#myTable').html(data);
        })
    }
      
    function load_product_by_id(productId){
        return $.ajax({
            url: 'inventory/load_product_by_id.php',
            method: 'POST',
            data: {productId:productId},
            dataType: 'json'
        }).done(function(data){
            product = data;
        })
    }
      
    function product_form(){
        return $.ajax({
            url:'inventory/product_form.php'
        }).done(function(data){
            $('#myTable').html(data);
        })
    }
      function order_form(){
        return $.ajax({
            url:'orders/order_form.php'
        }).done(function(data){
            $('#myTable').html(data);
        })
    }
      
    function edit_product_form(productId){
        $.when(product_form()).then(function(){ //got the form
            
            $('form').on('submit', function(event){ // stops the submit action
            event.preventDefault();
            var formData = $( this ).serialize();
            edit_product(formData);
            });
            
            $.when(load_product_by_id(productId)).then(function(){ //got the data
                $( "input[name='oldId']" ).val(product["productId"]);
                $( "input[name='productId']" ).val(product["productId"]);
                $( "input[name='productName']" ).val(product["productName"]);
                $( "input[name='quantity']" ).val(product["quantity"]);
                $( "input[name='price']" ).val(product["price"]);
                $( "input[name='minimum']" ).val(product["minimum"]);
            });
        });   
    }
      
    function edit_product(formData){
        $.ajax({
            url: 'inventory/edit_product.php',
            data: formData,
            method: 'POST'    
        }).done(function(data){
            load_products();
            $('#response').html(data);
        })
    }  
      
    function edit_customer(formData){
        $.ajax({
            url: 'customers/edit_customer.php',
            data: formData,
            method: 'POST'    
        }).done(function(data){
            load_customers();
            $('#response').html(data);
        })
    }  
    
    function edit_customer_form(id){
        $.when(customer_form()).then(function(){ //got the form
            
            $('form').on('submit', function(event){ // stops the submit action
            event.preventDefault();
            var formData = $( this ).serialize();
            edit_customer(formData);
            });
            
            $.when(load_customer_by_id(id)).then(function(){ //got the data
                $( "input[name='oldId']" ).val(customer["id"]);
                $( "input[name='id']" ).val(customer["id"]);
                $( "input[name='firstName']" ).val(customer["firstName"]);
                $( "input[name='lastName']" ).val(customer["lastName"]);
                $( "input[name='address']" ).val(customer["address"]);
                $( "input[name='email']" ).val(customer["email"]);
                $( "input[name='phoneNumber']" ).val(customer["phoneNumber"]); 
            });
        });   
    }
      
    function add_customer(formData){
        $.ajax({
            url: 'customers/add_customer.php',
            data: formData,
            method: 'POST'    
        }).done(function(data){
            load_customers();
        })
    }
    
    function add_product(formData){
        $.ajax({
            url: 'inventory/add_product.php',
            data: formData,
            method: 'POST'    
        }).done(function(data){
            load_products();
        })
    }
      function add_order(formData){
        $.ajax({
            url: 'orders/add_order.php',
            data: formData,
            method: 'POST'    
        }).done(function(data){
            load_orders();
        })
    }
      
    function add_customer_form(){
        $.when(customer_form()).then(function(){ //got the form
            
            $('form').on('submit', function(event){ // stops the submit action
            event.preventDefault();
            var formData = $( this ).serialize();
            add_customer(formData);
            });
            
        });
    }
      
    function add_product_form(){
        $.when(product_form()).then(function(){ //got the form
            
            $('form').on('submit', function(event){ // stops the submit action
            event.preventDefault();
            var formData = $( this ).serialize();
            add_product(formData);
            });
            
        });
    }
      
      function add_order_form(){
        $.when(order_form()).then(function(){ //got the form
            
            $('form').on('submit', function(event){ // stops the submit action
            event.preventDefault();
            var formData = $( this ).serialize();
            add_order(formData);
            });
            
        });
    }
      function logout(){
          $.ajax({
              url:'session.php',
              method:'POST',
              data:{logout:"logout"}
              
          }).done(function(data){
              if(data == 1){
                  location.reload();
              }
          })
      }
    
    </script>

</html>
