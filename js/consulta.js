function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
  }



const detalle=async (id)=>{
    
    const url = './servicios/servMantenimiento.php'
    
   
    setCookie("idpaciente",id,30)
    
    window.location.href = 'index.php?mantenimiento'
   // document.getElementById('nif').value=response.nif
    
    
}

async function consulta(p=1){
   
    const numpacientes=document.getElementById("cbopacientes").value;
    if(parseInt(p)==NaN) p=1
    
    
    const pagina=p;

    const buscar=document.getElementById("buscar").value;
    const tabla=document.getElementById("filas");
    const paginacion=document.getElementById("paginas");
    
    const url = './servicios/servConsulta.php'
    
    const datos=new FormData();
    datos.append('numpacientes',numpacientes)
    datos.append('pagina',pagina)
    datos.append('buscar',buscar)

    let param = {
        method: 'POST', 
        body: datos
    }
   
    const data=await fetch(url, param)
    
    const response=await data.json()
    const paginas=response.paginas

    tabla.innerHTML="";
    response.pacientes.forEach(e => {
        let fila = tabla.insertRow();
        fila.insertCell().innerHTML = e.nif;
        fila.insertCell().innerHTML = e.nombre;
        fila.insertCell().innerHTML = e.apellidos;
        enlace=`<input type='button' class='consulta' value='Detalle paciente' onclick='detalle(${e.idpaciente})'>` 
        fila.insertCell().innerHTML = enlace;

    });
    
    paginacion.innerHTML=""
    for(let x=1;x<=paginas;x++){
        paginacion.innerHTML+=`<a href='#' ${x}'><input type='button' id='pagina' value='${x}' onclick='consulta(${x})') ></a>`
    }
    
    
}

document.getElementById("cbopacientes").addEventListener("change",()=>consulta(1))
document.getElementById("buscar").addEventListener("keyup",()=>consulta(1))

consulta(1)