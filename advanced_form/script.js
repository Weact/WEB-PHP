function submit_form(src)
{

  var u_nom = document.getElementById('u_nom').value;
  var u_prenom  = document.getElementById('u_prenom').value;
  var u_ddn = document.getElementById('u_ddn').value;
  var u_email = document.getElementById('u_email').value;
  var u_poids = document.getElementById('u_poids').value;
  var u_taille = document.getElementById('u_taille').value;
  if(check_input(u_nom) && check_input(u_prenom) && ((parseInt(get_age(u_ddn),10) > 3) && (parseInt(get_age(u_ddn),10) < 100)) && u_taille > 120 && u_taille < 250 && u_poids < 400 && u_poids > 30)
  {
    can_submit = true;
  }else{
    can_submit = false;
    alert('Un de vos champs sont incorrect, veuillez verifier vos saisies.');
    if(!check_input(u_nom))
    {
      document.getElementById('u_nom').style.color = "red";
      document.getElementById('u_nom').scrollIntoView();
    }else{
      document.getElementById('u_nom').style.color = "green";
    }
    if(!check_input(u_prenom))
    {
      document.getElementById('u_prenom').style.color = "red";
      document.getElementById('u_prenom').scrollIntoView();
    }else{
      document.getElementById('u_prenom').style.color = "green";
    }
    if(!((parseInt(get_age(u_ddn),10) > 3) && (parseInt(get_age(u_ddn),10) < 100)))
    {
      document.getElementById('u_ddn').scrollIntoView();
      document.getElementById('u_ddn').style.color = "red";
    }else{
      document.getElementById('u_ddn').style.color = "green";
    }
    if(u_taille < 120 || u_taille > 250 )
    {
    	document.getElementById('u_taille').scrollIntoView();
    	document.getElementById('u_taille').style.color = "red";
    }else{
    	document.getElementById('u_taille').style.color = "green";
    }
    if(u_poids > 400 || u_poids < 30)
    {
    	document.getElementById('u_poids').scrollIntoView();
    	document.getElementById('u_poids').style.color = "red";
    }else{
    	document.getElementById('u_poids').style.color = "green";
    }
  }
    if(can_submit)
      var form = document.getElementById("myForm").submit();
}

function check_input(input)
{
  var letters = /^[A-Za-z]+$/;
  if(input.match(letters))
  {
    return true;
  }else{
    console.log(input + "is not a valid input !");
    return false;
  }
}

function get_age(date)
{
  const words = date.split('-');
  var dt = new Date();
  var current_year = dt.getYear() + 1900;

  var c_year_int = parseInt(current_year, 10);
  var c_bday_int = parseInt(words[0], 10);

  return c_year_int - c_bday_int;
}