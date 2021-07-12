function validar(type,id){
  let nome = document.getElementById('name');
  let idade = document.getElementById('year');
  if(type=="c" && id== 0){
    if(nome.value == "" || nome.value.length < 2){
      alert("Preencha o campo de nome corretamente");
      return false;
    }else if(idade.value < 0 || idade.value > 120){
      alert("Preencha o campo de idade corretamente");
      return false;
    }
    axios.get("php/php.php?a=c",{
      params:{
        name:nome.value,
        year:idade.value
      }
    })
    .then(function(){
      window.location.reload(1);
    }).catch(function(){
        console.log("erro");
    })
    return false;
  }else if(type=="u" && id > 0){
    if(nome.value == "" || nome.value.length < 2){
      alert("Preencha o campo de nome corretamente");
      return false;
    }else if(idade.value < 0 || idade.value > 120){
      alert("Preencha o campo de idade corretamente");
      return false;
    }
    axios.get("php/php.php?a=u",{
      params:{
        name:nome.value,
        year:idade.value,
        id:id
      }
    })
    .then(function(){
      window.location.reload(1);
    }).catch(function(){
        console.log("erro");
    })
    return false;
  }
}
const xhr= new XMLHttpRequest();
const tds={
  IserirTD_nome(tr,texto){
    let td=document.createElement("td");
    let txt=document.createTextNode(texto);
    td.appendChild(txt);
    tr.appendChild(td);
    return tr;
  },
  IserirTD_idade(tr,texto){
    let td=document.createElement("td");
    let txt=document.createTextNode(texto);
    td.appendChild(txt);
    tr.appendChild(td);
    return tr;
  },
  IserirTD_btn(tr,id){
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
    btn_edit.setAttribute("onclick","editar("+id+")");
    btn_ex.setAttribute("onclick","excluir("+id+")");
    td_edit.appendChild(btn_edit);
    td_ex.appendChild(btn_ex);
    tr.appendChild(td_edit);
    tr.appendChild(td_ex);
    return tr;
  }
}
function mostrar_dados(){
  xhr.onreadystatechange = function(){
    if(this.readyState==4){
      if(this.status==200){
        let tb=document.getElementById('tb');
        var array=JSON.parse(xhr.responseText);
        for (let i = 0; i < array.length; i++) {
          tr=document.createElement("tr");
          tds.IserirTD_nome(tr,array[i]['nome']);
          tds.IserirTD_idade(tr,array[i]['idade']);
          tds.IserirTD_btn(tr,array[i]['id']);
          tb.appendChild(tr);
        }
      }else if(xhr.status==400){
        console.log("file or resource not found");
      } 
    };
  }
  xhr.open('get','php/php.php?a=ver_resultados',true);
  xhr.send();
}

function editar(id){
  xhr.onreadystatechange=function(){
    if(this.readyState==4){
      if(this.status==200){
        let nome=document.getElementById('name');
        let year=document.getElementById('year');
        let h1=document.getElementById('title');
        let submit=document.getElementById('submit');
        let array=JSON.parse(this.responseText);
        nome.value=array[0]['nome'];
        year.value=array[0]['idade'];
        h1.innerHTML="Editar usuario";
        submit.value="Editar";
        mudarActionForm(array[0]['id'],"update");
      }else if(xhr.status==400){
        console.log("file or resource not found");
      }
    };
  }
  xhr.open('get','php/php.php?a=verID&id='+id,true);
  xhr.send();
}
function excluir(id){
  axios.get("php/php.php?a=excluir",{
    params:{
      id:id
    }
  })
  .then(function(){
    window.location.reload(1);
  }).catch(function(){
      console.log("erro");
  })
}

function mudarActionForm(id,tipo){
  if(tipo=="update"){
    document.getElementById('form').setAttribute("onsubmit","return validar('u',"+id+")");
  }
}
mostrar_dados();