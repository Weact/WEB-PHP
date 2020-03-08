/*                          *
*      LUDUS  ACADEMIE      *
*    OWNER : DRUCKES Lucas  *
*      WEACT     2020       *
*   JS FILE FOR  INDEX.PHP  *
*          YAPADKASS        *
*                           */

function verif()
{
  var form = document.getElementById('form_database');
  var c_nom = document.getElementById('cb_nom');
  var c_loc = document.getElementById('cb_loc');
  var c_ddn = document.getElementById('cb_ddn');
  var c_prod = document.getElementById('cb_prod');

  if(!c_nom.checked && !c_loc.checked && !c_ddn.checked && !c_prod.checked)
  {
    can_submit = false;
    c_nom.style.border = "5px red solid";
    c_loc.style.border = "5px red solid";
    c_ddn.style.border = "5px red solid";
    c_prod.style.border = "5px red solid";
    c_nom.focus();
  }else{
    can_submit = true;
  }

  if(can_submit)
    form.submit();
}
