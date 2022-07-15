function agregarProductoCarro(id){
    var cantidad = $('#cantidad'+id).val();
    if(cantidad != 0){
        //alert("producto:"+id+"cantidad"+cantidad);
        $.ajax
        ({
          url      : 'AgregarProducto.php',
          type     : 'post',
          dataType : 'text',
          data     : 'cantidad='+cantidad+'&id='+id,
          success  : function(respuesta)
          {
            if(respuesta == 1)
            {
                
            }
          },
          error: function()
          {
            alert('Error archivo no encontrado...');
          }
        });
    }
    
}

function ocultar(id)
            {
                //var confirmar = confirm("Quiere eliminar esta fila?");
                //if(confirmar)
                    $('#fila_'+id).hide();
            }
function eliminarProductos(fila)
      {
        $.ajax
        ({
          url      : 'eliminaProductoPedido.php',
          type     : 'post',
          dataType : 'text',
          data     : 'id='+fila,
          success  : function(respuesta)
          {
            if(respuesta == 1)
            {
                ocultar(fila)
                window.location.href = "CarritoV.php";
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
function EnviarPedido(id){
  if(id != null){
    //alert("entra");
    $.ajax
    ({
      url      : 'EnviarPedido.php',
      type     : 'post',
      dataType : 'text',
      data     : 'id='+id,
      success  : function(respuesta)
      {
        if(respuesta == 1)
        {
          window.location.href = "index.php";
        }
      },
      error: function()
      {
        alert('Error archivo no encontrado...');
      }
    });
}
}
function SendMaill()
{
  
  var correo  = $('#correo').val();
  var asunto  = $('#asunto').val();
  var mensaje  = $('#mensaje').val();
  
  alert(mensaje);
  if(correo==""||asunto==""||mensaje=="")
  {
      $('#mensaje2').html('Faltan campos por llenar');
      setTimeout("$('#mensaje2').html('');",5000);
  }
  else
  {
    var parametros = new FormData($("#form")[0]);
    $.ajax
      ({
        data     : parametros,
        url      : "mail.php",
        type     : "POST",
        contentType: false,
        processData: false,
        success  : function(respuesta)
        {
          if(respuesta == 1)
          {
              //alert("Exito");
              window.location.href = "index.php";
              
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