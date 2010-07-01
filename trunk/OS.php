<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recibo eletrônico</title>
</head>

<body>
<form id="reciboEletrônico" action="" method="post">
    <table id="dadosForm">
        <th>Dados do cliente:</th>
        <!--
        <tr>
            <td>
                <input type="radio" name="tipoP" value="0" />  Pessoa física
            </td>
            <td>
                <input type="radio" name="tipoP" value="1" />  Pessoa jurídica
            </td>
        </tr>
        -->   
        <tr>
            <td>
                Nome: 
            </td>
            <td>
                <input id="cliNome" name="cliNome" type="text" />
            </td>
        </tr>
        <!-- 
        <tr>
            <td>
                Empresa: 
            </td>
            <td>
                <input id="cliEmpresa" name="cliEmpresa" type="text" />
            </td>
        </tr> 
       -->   
        <tr>
            <td>
                Email: 
            </td>
            <td>
                <input id="cliEmail" name="cliEmail" type="text" />
            </td>
        </tr>
    
        <tr>
            <td>
                Telefone: 
            </td>
            <td>
                <input id="cliTelefone" name="cliTelefone" type="text" />
            </td>
        </tr>
        <tr>
            <td>
                Endere&ccedil;o: 
            </td>
            <td>
                <input id="cliEndereco" name="cliEndereco" type="text" />
            </td>
        </tr>
    
        <tr>
        </tr>
        <th>Dados do serviço:</th>
        <tr>
            <td>
                Descrição do serviço: 
            </td>
            <td>
                <textarea id="servicoDescricao" name="servicoDescricao" /></textarea>
            </td>
        </tr>
        <tr>
            <td>
            valor: 
            </td>
            <td>
                <input id="servicoValor" name="servicoValor" type="text" />
            </td>
        </tr>    
        <tr>
            <td>
               Observações da OS: 
            </td>
            <td>
                <input id="ObsOS" name="ObsOS" type="text" />
            </td>
        </tr>
    
        <tr>
            <td>
                Observações internas: 
            </td>
            <td>
                <input id="ObsInt" name="ObsInt" type="text" />
            </td>
        </tr>
        <tr>
        	<td>
            </td>
        	<td align="right">
	        	<input type="submit"  value="Criar OS"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
