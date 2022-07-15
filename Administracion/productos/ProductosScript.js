function ocultar(id)
            {
                //var confirmar = confirm("Quiere eliminar esta fila?");
                //if(confirmar)
                    $('#fila_'+id).hide();
            }
function eliminaFilasProducto(fila)
      {
        $.ajax
        ({
          url      : 'procesoEliminarProducto.php',
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
      
      function validaCodigo(id)
      {
          var codigo = $('#codigo').val();
         
          if(codigo!="")
          {
              $.ajax
              ({
                url      : 'procesoCodigo.php',
                type     : 'post',
                dataType : 'text',
                data     : 'codigo='+codigo+'&id='+id,
                success  : function(respuesta)
                {
                  if(respuesta == 1)
                  {
                      $('#mensaje1').html('El codigo '+codigo+' ya esta registrado con otro producto');
                      document.getElementById("codigo").value = "";
                      setTimeout("$('#mensaje1').html('');",5000);
                  }
                },
                error: function()
                {
                  alert('Error archivo no encontrado...');
                }
              });
          }
      }
      
      function validaDatosProductos()
      {
        var nombre  = $('#nombre').val();
        var codigo  = $('#codigo').val();
        var descripcion  = $('#descripcion').val();
        var stock  = $('#stock').val();
        var costo  = $('#costo').val();
        var archivo = $('#archivo').val();
        
        
        if(nombre==""||codigo==""||descripcion==""||stock==""||costo==""||archivo=="")
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
              url      : "procesoAgregarProducto.php",
              type     : "POST",
              contentType: false,
              processData: false,
              success  : function(respuesta)
              {
                if(respuesta == 1)
                {
                    //alert("Exito");
                    window.location.href = "ListadoProductos.php";
                    
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
      
      
function validaDatosProductosEditar()
{
  
  var nombre  = $('#nombre').val();
  var codigo  = $('#codigo').val();
  var descripcion  = $('#descripcion').val();
  var stock  = $('#stock').val();
  var costo  = $('#costo').val();

  if(nombre==""||codigo==""||descripcion==""||stock==""||costo=="")
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
        url      : "procesoEditarProducto.php",
        type     : "POST",
        contentType: false,
        processData: false,
        success  : function(respuesta)
        {
          if(respuesta == 1)
          {
            //alert("Exito");
            window.location.href = "ListadoProductos.php";
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