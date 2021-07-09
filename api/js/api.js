var url= "http://localhost/colors/";
function getAjax(urlx, method, json_req, resp_format) {
    var resp = null;
    jQuery.ajax({
        type: method,
        contentType: 'application/json; charset=utf-8',
        dataType: resp_format,
        url: urlx,
        data: json_req,
        success: function (data) {
            resp = data;
        },
        error: function (request, error) {
        console.log(arguments);
      //  alert("El error es porque " + error);
    },
        async: false
    });
    return resp;
}

function login(){
  var user= document.getElementById('username').value;
  var pass= document.getElementById('password').value;
  var json= {'username':user,'password':pass};
  var obj= JSON.stringify(json);
  response = getAjax(url+"api/login.php", 'POST', obj, 'json');
  if(response['status']==200){
    alert(response['mensaje']);
    location.href ="http://localhost/colors/aplication/interfaz.php";
  }else{
    alert(response['mensaje']);
    location.reload();
  }
}

function addcolor(){
  var nombre= document.getElementById('namec').value;
  var hex= document.getElementById('codhex').value;
  var pant= document.getElementById('cotpat').value;
  var year= document.getElementById('year').value;

  var json= {'name':nombre,'hexadecimal':hex,'pantone':pant,'year':year};
  var obj= JSON.stringify(json);
  response = getAjax(url+"api/colors.php", 'POST', obj, 'json');
  if(response['status']==200){
    alert(response['mensaje']);
    location.reload();
  }else{
    alert(response['mensaje']);
  }
}

function readcolor(id){
  var json= {'idcolor':id};
  var obj= JSON.stringify(json);
  response = getAjax(url+"api/readcolor.php", 'POST', obj, 'json');
  if(response['status']==200){
    var inp_name= document.getElementById('namec2').value=response['data'][0]['name'];
    var inp_color= document.getElementById('codhex2').value=response['data'][0]['color'];
    var inp_pantone= document.getElementById('cotpat2').value=response['data'][0]['pantone'];
    var inp_year=year= document.getElementById('year2').value=response['data'][0]['year'];
    var hidden= year= document.getElementById('idhidden').value=response['data'][0]['idcolor'];
    var tittle= document.getElementById('editcolortittle').innerHTML="<h5 class='modal-title' id='editcolortittle'> Editando "+response['data'][0]['name']+"</h5>";
  }else{
    var inp_name= document.getElementById('namec2').value=response['data'];
    var inp_color= document.getElementById('codhex2').value=response['data'];
    var inp_pantone= document.getElementById('cotpat2').value=response['data'];
    var inp_year=year= document.getElementById('year2').value=response['data'];
    var hidden= year= document.getElementById('idhidden').value=response['data'];
    var tittle= document.getElementById('editcolortittle').innerHTML="<h5 class='modal-title' id='editcolortittle'> Editando "+response['data']+"</h5>";
  }
}

function editcolor(){
  var nombre= document.getElementById('namec2').value;
  var hex= document.getElementById('codhex2').value;
  var pant= document.getElementById('cotpat2').value;
  var year= document.getElementById('year2').value;
  var id= document.getElementById('idhidden').value;

  var json= {'name':nombre,'hexadecimal':hex,'pantone':pant,'year':year,'idcolor':id};
  var obj= JSON.stringify(json);
  response = getAjax(url+"api/colors.php", 'PUT', obj, 'json');
  if(response['status']==200){
    alert(response['mensaje']);
    location.reload();
  }else{
    alert(response['mensaje']);
  }
}

function deletecolor(){
  var id= document.getElementById('todelete').value;
  var json= {'idcolor':id};
  var obj= JSON.stringify(json);
  response = getAjax(url+"api/colors.php", 'DELETE', obj, 'json');
  if(response['status']==200){
    alert(response['mensaje']);
    location.reload();
  }else{
    alert(response['mensaje']);
  }
}

function sendid(id){
  document.getElementById('todelete').value=id;
}

function logout(id){
  var val=1
  var json= {'valor':val};
  var obj= JSON.stringify(json);
  response = getAjax(url+"api/logout.php", 'POST', obj, 'json');
  if (response['status']==200){
    location.href ="http://localhost/colors/aplication/index.php";
  }
}
