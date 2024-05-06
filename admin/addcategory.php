<?php
include("header.php");
?>

<style>
        

        form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 18px 15px;
  font-size: 12px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #1e6a8f;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}

    form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  width: 300px;
    color: #fff;
    letter-spacing: 1px;
    border: none;
    background: #97dcd3;
    cursor: pointer;
    font-size: 21px;
}
.input-box.button input:hover{
  background: #97dcd3;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color:#97dcd3;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
  
    .box{
  margin-top:10px;
  width:300px;
}
  
     textarea{
    height: 100%;
  width: 100%;
  outline: none;
  padding: 18px 15px;
  font-size: 12px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #1e6a8f;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
    
  }

    </style>
<body style="background: url(../images/l7.jpg) no-repeat center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    min-height: 794px;">
<center>
	   <div id="content">
	  
		<mark>
				<?php if (isset($_GET['ms'])) {
					echo $_GET['ms'];
				} ?>
			</mark>
           <div style="    background-color: #1e6a8f;
    width: 382px;
    height: 62em;
    margin-top: 130px;
    padding-top: 17px;
">
			<h2><b style="margin-left:-18px; color:#67bfff; font-family:Open Sans, Arial, sans-serif; font-size:14px; font-weight:700; color:#fff;">ADD CATEGORY</b></h2>
                                <BR> 
                              <div class="box">

                                <form action="addcatebk.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
				               <input class="form-control" type="file" name="uploadfile" value="" />
			                   </div><br />
                                    
                               <div class="input-box">
                                  
                                  <input type="text" name="bookname" placeholder="Book Name: " required>
                                </div><br>
                                  
                                <div class="input-box">
                                  
                                  <input type="text" name="authorname" placeholder="Author Name: " required>
                                </div><br>

                                
                                    <div class="input-box">
                                  
                                  <textarea type="text" name="description" placeholder="description.. : "  cols="43" rows="5"></textarea>
                                  </div><br>

                                  
                                  <div class="input-box">
                                  
                                  <input type="text" name="language" placeholder="language: " required>
                                </div><br>


                                <div class="input-box">
                                  
                                  <input type="text" name="country" placeholder="country: " required>
                                </div><br>

                                <div class="input-box">
                                  
                                  <input type="text" name="genre" placeholder="genre: " required>
                                </div><br>

                                <div class="input-box">
                                  
                                  <input type="text" name="publisher" placeholder="publisher: " required>
                                </div><br>

                                <div class="input-box">
                                  
                                  <input type="text" name="published" placeholder="published: " required>
                                </div><br>
            
			
                                  
            
			<input type="submit" value="Submit" id = "btn_s" name="upload" style="background-color:#1e6a8f; border-width:0px; color:#fff;"><br/></br>
			
		
	</form>
        
        
	</div>
      </div>
            </center>
    
    
	
</body>
