function ocultar(id)
            {
                //var confirmar = confirm("Quiere eliminar esta fila?");
                //if(confirmar)
                    $('#fila_'+id).hide();
            }
function eliminaFilasBanners(fila)
      {
        $.ajax
        ({
          url      : 'procesoEliminarBanners.php',
          type     : 'post',
          dataType : 'text',
          data     : 'id='+fila,
          success  : function(respuesta)
          {
            if(respuesta == 1)
            {
                ocultar(fila)
              //alert('Eliminado');
            }
            else
            {
                alert('Error al eliminar');
            }
          },
          error: function()
          {
            alert('Error archivo no encontrado...');
          }
        });
      }

      function limpiaCampo()
      {
          $('#correo').val('');
      }
      
      
      function validaDatosBanners()
      {
        var nombre  = $('#nombre').val();
        var archivo = $('#archivo').val();
        
        
        if(nombre==""||archivo=="")
        {
            $('#mensaje2').html('Faltan campos por llenar');
            setTimeout("$('#mensaje2').html('');",5000);
        }
        else
        {
          var parametros = new FormData($("#form01")[0]);
          $.ajax
            ({
              data     : parametros,
              url      : "procesoAgregarBanners.php",
              type     : "POST",
              contentType: false,
              processData: false,
              success  : function(respuesta)
              {
                if(respuesta == 1)
                {
                    //alert("Exito");
                    window.location.href = "ListadoBanners.php";
                    
                }
                else
                {
                  alert("Error!!!");
                }
              }
              ,
              error: function()
              {
                alert('Error archivo no encontrado...');
              }
              
            });
            return true;
        }       
      }     
      
      
function validaDatosBannersEditar()
{
  
  var nombre  = $('#nombre').val();
  

  if(nombre=="")
  {
      $('#mensaje2').html('Faltan campos por llenar');
      setTimeout("$('#mensaje2').html('');",5000);
  }
  else
  {
    var parametros = new FormData($("#form01")[0]);
    $.ajax
      ({
        data     : parametros,
        url      : "procesoEditarBanners.php",
        type     : "POST",
        contentType: false,
        processData: false,
        success  : function(respuesta)
        {
          if(respuesta == 1)
          {
            //alert("Exito");
            window.location.href = "ListadoBanners.php";
          }
          else
          {
            //alert("Error!!!");
            alert(respuesta);
          }
        },
        error: function()
        {
          alert('Error archivo no encontrado...');
        }
      });
      return true;

  }       
}     