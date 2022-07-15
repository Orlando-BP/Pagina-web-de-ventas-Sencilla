function limpiaCampo()
{
    $('#correo').val('');
}

function validaMail(id)
{
    var correo = $('#correo').val();
   
    if(correo!="")
    {
        $.ajax
        ({
          url      : 'ComprobarCorreo.php',
          type     : 'post',
          dataType : 'text',
          data     : 'correo='+correo+'&id='+id,
          success  : function(respuesta)
          {
            if(respuesta == 1)
            {
                $('#mensaje1').html('El correo '+correo+' ya esta registrado con otro usuario');
                document.getElementById("correo").value = "";
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

function validaDatos()
{
  var nombre  = $('#nombre').val();
  var apellidos  = $('#apellidos').val();
  var correo  = $('#correo').val();
  var pass  = $('#pass').val();
  var rol  = $('#rol').val();
  var archivo = $('#archivo').val();
  
  
  if(nombre==""||apellidos==""||correo==""||pass==""||rol==0||archivo=="")
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
        url      : "AltaDeAdministradores.php",
        type     : "POST",
        contentType: false,
        processData: false,
        success  : function(respuesta)
        {
          if(respuesta == 1)
          {
              //alert("Exito");
              window.location.href = "ListarAdministradores.php";
              
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


function validaDatosEdicion()
{
  var nombre  = $('#nombre').val();
  var apellidos  = $('#apellidos').val();
  var correo  = $('#correo').val();
  var pass  = $('#pass').val();
  var rol  = $('#rol').val();

  if(nombre==""||apellidos==""||correo==""||rol==0)
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
        url      : "EdicionDeAdministradores.php",
        type     : "POST",
        contentType: false,
        processData: false,
        success  : function(respuesta)
        {
          if(respuesta == 1)
          {
            alert("Exito");
            window.location.href = "ListarAdministradores.php";
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


function validaDatosSesion()
{
  var correo  = $('#correo').val();
  var pass  = $('#pass').val();

  if(correo==""||pass=="")
  {
      $('#mensaje1').html('Faltan campos por llenar');
      setTimeout("$('#mensaje1').html('');",5000);
  }
  else
  {
    $.ajax
      ({
        url      : 'ValidaUsuario.php',
        type     : 'post',
        dataType : 'text',
        data     : 'correo='+correo+'&pass='+pass,
        success  : function(respuesta)
        {
          if(respuesta == 1)
          {
              //alert("Exito");
              window.location.href = "Bienvenido.php";
          }
          else
          {
            //alert("¡¡El usuario o la contraseña no son correctos!!");
            $('#mensaje1').html('¡¡El usuario o la contraseña no son correctos!!');
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