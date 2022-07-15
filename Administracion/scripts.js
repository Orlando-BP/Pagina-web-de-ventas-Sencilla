///separador
function ocultar(id)
            {
                //var confirmar = confirm("Quiere eliminar esta fila?");
                //if(confirmar)
                    $('#fila_'+id).hide();
            }
function eliminaFilas(fila)
      {
        $.ajax
        ({
          url      : 'adminisradores_elimina.php',
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
///separador