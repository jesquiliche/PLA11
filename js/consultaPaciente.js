var id;
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = document.cookie;
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

const consultapaciente = async () => {
  const url = "./servicios/servMantenimiento.php";

  id = getCookie("idpaciente");

  const datos = new FormData();

  datos.append("idpaciente", id);

  let param = {
    method: "POST",
    body: datos,
  };

  const data = await fetch(url, param);

  const response = await data.json();
  console.log(response);
  document.getElementById('idpaciente').value=response.idpaciente
  document.getElementById('nif').value=response.nif
  document.getElementById('nombre').value=response.nombre
  document.getElementById('apellidos').value=response.apellidos
  document.getElementById('fechaingreso').value=response.fechaingreso
  document.getElementById('fechaalta').value=dresponse.fechaalta

  // window.location.href = 'index.php?mantenimiento'
};

consultapaciente();
