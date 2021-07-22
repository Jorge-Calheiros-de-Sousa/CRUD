function validation(type,id){
  let name = document.getElementById('name');
  let yearOld = document.getElementById('year');
  if(name.value == "" || name.value.length < 2){
    alert("Preencha o campo de nome corretamente");
    return false;
  }else if(yearOld.value < 0 || yearOld.value > 120|| yearOld.value.length == 0){
    alert("Preencha o campo de idade corretamente");
    return false;
  }else{
    if(type=="c" && id== 0){
      const params={
        ID:0,
        Name:name.value,
        YearOld:yearOld.value
      }
      makeRequest('http://localhost/CRUD/mvc/Controller/RecordsControllers.php','post',{data: params})
      .then(function(){
        window.location.reload(1);
      }).catch(function(){
          console.log("erro");
      })
    }else{
      const params={
        ID:id,
        Name:name.value,
        YearOld:yearOld.value
      }
      makeRequest("http://localhost/CRUD/mvc/Controller/RecordsControllers.php","put",{data: params})
      .then(function(){
        window.location.reload(1);
      }).catch(function(){
          console.log("erro");
      })
    }
  }
  return false;
}
const xhr= new XMLHttpRequest();
const tds={
  InserTD_name(tr,text){
    let td=document.createElement("td");
    let txt=document.createTextNode(text);
    td.appendChild(txt);
    tr.appendChild(td);
    return tr;
  },
  InserTD_year(tr,text){
    let td=document.createElement("td");
    let txt=document.createTextNode(text);
    td.appendChild(txt);
    tr.appendChild(td);
    return tr;
  },
  InserTD_btn(tr,id){
    let td_edit=document.createElement("td");
    let td_ex=document.createElement("td");
    let btn_edit=document.createElement("button");
    let btn_ex=document.createElement("button");
    let txt_edit=document.createTextNode("Editar");
    let txt_ex=document.createTextNode("Excluir");
    btn_edit.setAttribute("id","edit_"+id);
    btn_edit.setAttribute("class","edit");
    btn_ex.setAttribute("id","ex_"+id);
    btn_ex.setAttribute("class","ex");
    btn_edit.appendChild(txt_edit);
    btn_ex.appendChild(txt_ex);
    btn_edit.setAttribute("onclick","update("+id+")");
    btn_ex.setAttribute("onclick","destroy("+id+")");
    td_edit.appendChild(btn_edit);
    td_ex.appendChild(btn_ex);
    tr.appendChild(td_edit);
    tr.appendChild(td_ex);
    return tr;
  }
}
function show_list(){
  xhr.onreadystatechange = function(){
    if(this.readyState==4){
      if(this.status==200){
        let tb=document.getElementById('tb');
        var array=JSON.parse(xhr.responseText);
        for (let i = 0; i < array.length; i++) {
          tr=document.createElement("tr");
          tds.InserTD_name(tr,array[i]['name_user']);
          tds.InserTD_year(tr,array[i]['yearOld_user']);
          tds.InserTD_btn(tr,array[i]['id']);
          tb.appendChild(tr);
        }
      }else if(xhr.status==400){
        console.log("file or resource not found");
      } 
    };
  }
  xhr.open('get','http://localhost/CRUD/mvc/Controller/RecordsControllers.php',true);
  xhr.send();
}

function update(id){
  xhr.onreadystatechange=function(){
    if(this.readyState==4){
      if(this.status==200){
        let nome=document.getElementById('name');
        let year=document.getElementById('year');
        let h1=document.getElementById('title');
        let submit=document.getElementById('submit');
        let array=JSON.parse(this.responseText);
        nome.value=array[0]['name_user'];
        year.value=array[0]['yearOld_user'];
        h1.innerHTML="Editar usuario";
        submit.value="Editar";
        change_Function_of_Form(array[0]['id'],"update");
      }else if(xhr.status==400){
        console.log("file or resource not found");
      }
    };
  }
  xhr.open('get','http://localhost/CRUD/mvc/Controller/RecordsControllers.php?ID='+id,true);
  xhr.send();
}
function destroy(id){
  const params={
    ID:id
  }
  makeRequest('http://localhost/CRUD/mvc/Controller/RecordsControllers.php','delete',{params: params})
  .then(function(){
    window.location.reload(1);
  }).catch(function(){
      console.log("erro");
  })
}

function change_Function_of_Form(id,type){
  if(type=="update"){
    document.getElementById('form').setAttribute("onsubmit","return validation('u',"+id+")");
  }
}
show_list();