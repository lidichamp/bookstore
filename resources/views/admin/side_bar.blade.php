<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <b>AnRedia Book Store</b>
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <!--
            
-->


        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li >
                        <a href="{{ route("dashboard") }}" ><i class="fa fa-desktop "></i>Dashboard  </a>
                    </li>
                   

                    <li>
                        <a href="{{ route("addauthor") }}"><i class="fa fa-user "></i>Add Author   </a>
                    </li>
                    <li >
                        <a href="{{ route("editauthor") }}"><i class="fa fa-edit "></i>Edit Author  </a>
                    </li>



                 <li>
                        <a href="{{ route("addbook") }}"><i class="fa fa-book "></i>Add Book</a>
                    </li>
                    <li>
                        <a href="{{ route("editbook") }}"><i class="fa fa-edit"></i>Edit Book</a>
                    </li>

                    
                </ul>
                            </div>

        </nav>