<?php
	error_reporting(E_ERROR);
	if($_GET['email'] != "")
	{
		$email = $_GET['email'];
	}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link type="text/css" rel="stylesheet" href="main.css"  />
<script>
function setHiddenValue()
{
	
	document.getElementById('email').value = document.getElementById('clienteEmail').value;
	//alert(document.getElementById('email').value);

}
</script>


<title>Recibo eletrônico</title>
</head>

<body>
<form name="procuraCliente"  method="post" action="busRecibo.php?search=true">
<table>
	<th>Procura Cliente</th>
	<tr>
    	<td>
        	Email:
        </td>
        <td>
        	<input type="text"  id="clienteEmail" name="clienteEmail" value="<?php echo $email;?>" />
        </td>
    	<td>
        	<input type="submit" value="..." >
        </td>
    </tr>
</table>
</form>
<br>
<br>
<form onsubmit="setHiddenValue()" id='recibo' action='busRecibo.php?send=true' method='post'>
<table>
		<tr>
        	<td>Dados do serviço:</td>
         </tr>
         <tr>
        	<td><input type="hidden" id="email" name="email"></td>
         </tr>
        <tr>
            <td>
                Descrição do serviço: 
            </td>
            <td>
                <textarea id='servicoDescricao' name='servicoDescricao' /></textarea>
            </td>
        </tr>
        <tr>
            <td>
            Valor: 
            </td>
            <td>
                <input id='servicoValor' name='servicoValor' type='text' />
            </td>
        </tr>
        <tr>
            <td>
            (Por extenso) 
            </td>
            <td>
                <input id='servicoValorExt' name='servicoValorExt' type='text' />
            </td>
        </tr>
        <tr>
            <td>
            Forma de Pagamento: 
            </td>
            <td>
                <input id='formaPgto' name='formaPgto' type='text' />
            </td>
        </tr>              
        <tr>
            <td>
            N&uacute;mero do recibo: 
            </td>
            <td>
                <input id='numeroRecibo' name='numeroRecibo' type='text' />
            </td>
        </tr>             
        <tr>
            <td>
               Observações do Recibo: 
            </td>
            <td>
                <input id='obsRec' name='obsRec' type='text' />
            </td>
        </tr>
    
        <tr>
            <td>
                Observações internas: 
            </td>
            <td>
                <input id='obsInt' name='obsInt' type='text' />
            </td>
        </tr>
        <tr>
            <td>
                Local do serviço: 
            </td>
            <td>
                <input id='localServico' name='localServico' type='text' />
            </td>
        </tr>
		<tr>
        	<td>
            </td>
        	<td align='right'>
	        	<input type='submit'  value='Criar Recibo'/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>