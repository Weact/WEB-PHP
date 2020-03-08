//alert('Welcome to WebForm website by Weact (LUDUS ACADEMIE)');
const min_age = 0;
const max_age = 99;
const min_size = 130;
const max_size = 250;
const min_weight = 20;
const max_weight = 300;
const u_pass = "ludus";
const const_array = [min_age, max_age, min_size, max_size, min_weight, max_weight, u_pass];


function init() 
{
  init_max_input();
  let url = location; //récupère l'URL de la page
  let params = new URLSearchParams(url.search.slice(1)); //récupère le contenu de l'url après le '?' (inclus) et le sépare

  if(params.get('username') != null) //Si "username" n'est pas nul (chez moi c'est mon 1er élément)
  {
    var u_birthday = document.getElementById('user_birthdate').value;
    var age = get_age(u_birthday);
    document.getElementById('display_user_info').style.display = "block"; //Le div là où j'vais afficher les infos, j'le mets en display block, donc je l'affiche
    document.getElementById('p_username').innerHTML = "Nom de compte: " + params.get('username');
    document.getElementById('p_password').innerHTML = "Votre mot de passe: " + params.get('password');
    document.getElementById('p_name').innerHTML = "Votre prénom: " + params.get('user_name');
    document.getElementById('p_fname').innerHTML = "Votre nom: " + params.get('user_firstname');
    document.getElementById('p_email').innerHTML = "Votre EMail: " + params.get('user_email');
    document.getElementById('p_age').innerHTML = "Votre date de naissance(AAAA/MM/JJ) : " + params.get('user_birthdate');
    document.getElementById('p_gender').innerHTML = "Genre: " + params.get('user_gender');
    document.getElementById('p_size').innerHTML = "Votre taille: " + params.get('size') + "cm";
    document.getElementById('p_weight').innerHTML = "Votre Poids: " + params.get('weight') + "kg";
    document.getElementById('p_music').innerHTML = "Genre musical sélectionné: " + params.get('song-gend-select');

    /*les alert là c'était pour debug le bordel 
    alert("username " + params.get('username'));
    alert("password " + params.get('password'));
    alert("user_name " + params.get('user_name'));
    alert("user_firstname " + params.get('user_firstname'));
    alert("user_birthdate " + params.get('user_birthdate'));
    alert("user_gender " + params.get('user_gender'));
    alert("size " + params.get('size'));
    alert("weight " + params.get('weight'));
    alert("user_email " + params.get('user_email'));
    alert("song-gend-selct " + params.get('song-gend-selct'));*/

  }else{
    //Ce code va s'executer si "username" est vide, donc en soit, on a pas encore remplie le formulaire
    document.getElementById('display_user_info').style.display = "none"; //je cache le div là où les infos vont s'afficher
    //alert("Veuillez remplir le formulaire"); //je demande à l'utilisateur de remplir le formulaire
  }
}

function inform_user_select_menu()
{
  var i_selected = document.getElementById('song_gender_selection');
  var index = i_selected.options[i_selected.selectedIndex].value;
  alert('Vous avez sélectionné: ' + index);
}

function validate_form(src)
{
  console.log("Liste des constantes");
  for(i = 0; i < const_array.length; i++)
  {
    console.log(i + ' ' + const_array[i]);
  }

  var u_username = document.getElementById('user_username').value;
  var u_password  = document.getElementById('user_password').value;
  var u_name = document.getElementById('user_name').value;
  var u_fname = document.getElementById('user_firstname').value;
  var u_birthday = document.getElementById('user_birthdate').value;
  var u_gender = document.getElementById('user_gender').options[document.getElementById('user_gender').selectedIndex].value;
  var u_size = document.getElementById('user_size').value;
  var u_weight = document.getElementById('user_weight').value;
  var u_email = document.getElementById('user_email').value;
  var u_song_type = document.getElementById('song_gender_selection').options[document.getElementById('song_gender_selection').selectedIndex].value;
  if(u_password == u_pass && check_input(u_name) && check_input(u_fname) && ((parseInt(get_age(u_birthday),10) > 3) && (parseInt(get_age(u_birthday),10) < 100)))
  {
    can_submit = true;
  }else{
    can_submit = false;
    alert('Un de vos champs sont incorrect, veuillez verifier vos saisies.');
    if(u_password != u_pass)
    {
      document.getElementById('user_password').style.color = "red";
      document.getElementById('user_password').scrollIntoView();
    }else {
      document.getElementById('user_password').style.color = "green";
    }
    if(!check_input(u_name))
    {
      document.getElementById('user_name').style.color = "red";
      document.getElementById('user_name').scrollIntoView();
    }else{
      document.getElementById('user_name').style.color = "green";
    }
    if(!check_input(u_fname))
    {
      document.getElementById('user_firstname').style.color = "red";
      document.getElementById('user_firstname').scrollIntoView();
    }else{
      document.getElementById('user_firstname').style.color = "green";
    }
    if(!((parseInt(get_age(u_birthday),10) > 3) && (parseInt(get_age(u_birthday),10) < 100)))
    {
      document.getElementById('user_birthdate').scrollIntoView();
      document.getElementById('user_birthdate').style.color = "red";
    }else{
      document.getElementById('user_birthdate').style.color = "green";
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

function init_max_input()
{
  document.getElementById('user_size').max = max_size;
  document.getElementById('user_weight').max = max_weight;
  document.getElementById('user_size').min = min_size;
  document.getElementById('user_weight').min = min_weight;
}

function check_checkbox(class_name)
{
  var checkboxes = document.getElementsByClassName(class_name);
  var checkboxesChecked = [];
  for(var i = 0; i<checkboxes.length; i++)
  {
    if(checkboxes[i].checked){
      checkboxesChecked.push(checkboxes[i]);
    }
  }
  /*for(var j = 0; j<checkboxesChecked.length; j++)
  {
    console.log(checkboxesChecked[j].value);
  }*/

  return checkboxesChecked;
}