

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

 <!-- Content -->
 <div id="content"> 
    
    <!-- Products -->
    <section class="shop-page  padding-bottom-100">
      <div class="container">
        <div class="row"> 
         
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title textAlignCenter">Changer les infos généraux</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="textinput">Nom du site</label>  
                            <div class="col-md-7">
                                <input  id="nameSite" type="text" placeholder="" value="<?= $configSite->nameSite;?>" class="form-control input-md">         
                                <br>
                            </div>
                            <label class="col-md-5 control-label" for="textinput">Email du site</label>  
                            <div class="col-md-7">
                                <input  id="emailSite" type="text" placeholder="" value="<?= $configSite->emailSite;?>" class="form-control input-md">         
                                <br>
                            </div>
                            <label class="col-md-5 control-label" for="textinput">Tel du site</label>  
                            <div class="col-md-7">
                                <input  id="telSite" type="text" placeholder="" value="<?= $configSite->telSite;?>" class="form-control input-md">         
                                <br>
                            </div>
                        </div>
                        <br>
                        <input type="button" class="center-block btn btn-primary" value="Changer" id="btnChangeGeneraux">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title textAlignCenter">Changer de logo</h3>
                    </div>
                    <div class="panel-body">                  
                        <form method="post" action="" enctype="multipart/form-data" id="myform">
                            <div class='preview'>
                            <img src="<?=$configSite->logoSite;?>" id="img" width="200" height="100"class="img-thumbnail">
                            </div>
                            <div ><br>
                                <input type="file" id="file" name="file" /><br>
                                <input type="button" class="center-block btn btn-primary" value="Changer" id="but_upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
               
        </div>
    </div>
</div>
</div>
      <hr>
      </div>      
</section>
<script>
   $(document).ready(function(){
        $("#but_upload").click(function(){
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);

            $.ajax({
                url: 'index.php?c=configSite&action=changeLogo',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        $("#img").attr("src",response); 
                        $("#logoSite").attr("src",response); 
                        $(".preview img").show(); // Display image element
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
        });
    });

    $("#btnChangeGeneraux").click(function(e){
        nameSite = document.getElementById("nameSite").value;
        telSite = document.getElementById("telSite").value;
        emailSite = document.getElementById("emailSite").value; 

        param = 'nameSite='+nameSite+'&telSite='+telSite+"&emailSite="+emailSite;
        url = 'index.php?c=configSite&action=changerGeneral';
        messageRetour = 'Les informations généraux du site sont mises à jour!';
        postAjax(param,url,messageRetour,true);  
    });

    </script>

<style>::after/* Container */
.container{
   
    text-align: center;
}

/* Preview */
.preview{
    width: 200px;
    height: 120px;
    border-radius: 5px;
    margin: 0 auto;
 
}
</style>

    <?php   include './assets/inc/footer.php';?>  	

