<?php

    class LoginUser
    {
        public static function login($dataUser)
        {
            $con = Connection::getConn();
            $cpfUser = $dataUser['userCPF'];
            $senhaUser = $dataUser['userPsw'];
            $pagina = '?pagina=home';
            $result = $log = $unidade = "0";

            while($result == 0){
	
	            ++$log;
	            $soapParams  = array('Sisnomsis'=> "PROTOCOLO",
			                         'Subsisnomsubsis'=> "PROTOCOLO",
			                         'Usrnumcpf'=> (float) $cpfUser,
			                         'Tip_fuc'=> "M",
			                         'Senha'=> $senhaUser);
	
	            $soapOptions = array('trace' => 1, "exception" => 0);
	            try
	            {
		            $ws = new SoapClient("http://sistemas.intranet.policiamilitar.sp.gov.br/MS/aws_permxml.aspx?WSDL", $soapOptions);
		            $rst = $ws->Execute($soapParams);
		            if($rst){
			            $result = "1";
		            }
	            }catch(SoapFault $client){
		            $result = "0";
	            }
		
	            $login = simplexml_load_string($rst->Xml_ws_perm, 'SimpleXMLElement', LIBXML_NOERROR | LIBXML_NOWARNING);
        
		        if($login->Status =='0'){
						
			        $url = "http://sistemas.intranet.policiamilitar.sp.gov.br/WSSCPM/Service.asmx?wsdl";
			
			        $client = new SoapClient($url);
			
			        $function = 'procuraPMPorCPF';
					
        			$arguments = array('procuraPMPorCPF ' => array('PMCPFNum' => $cpfUser));
			
                    $result = $client->__soapCall($function, $arguments);
                                     
            
                    $dataLogin = array(
                                        'postograd' => (string)$result->procuraPMPorCPFResult->codigoPostoGraduacaoPM->siglaPostoGraduacaoPM,
                                        're' => (string)$result->procuraPMPorCPFResult->Documentos->FuncionarioDocumento[0]->RE,
                                        'nomeGuerra' => (string)$result->procuraPMPorCPFResult->nomeGuePM,                       
                                        'codOPM' => (string)$result->procuraPMPorCPFResult->codigoOPMAtualPM->codigoOPM,                        					
                                        'cpf' => (string)$result->procuraPMPorCPFResult->Documentos->FuncionarioDocumento[0]->Numero.(string)$result->procuraPMPorCPFResult->Documentos->FuncionarioDocumento[0]->DigitoDocumento,
                                        'email' => (string)$result->procuraPMPorCPFResult->dadosContatoFuncionario->FuncionarioContato[0]->emailContato
                                        );
                        
                    $sql = $con->prepare('INSERT INTO sysadm_acess (re) VALUES (:mre)');
                            
                            $sql->bindValue(':mre', $dataLogin['re']); 
                            
                            $sql->execute();
                            $id = $con->lastInsertId();

                    array_push($dataLogin, $dataLogin['id']= $id);
                    return $dataLogin;
                         
                } elseif ($login->Status =='2'){
                    throw new Exception("CPF não localizado!");
                }elseif($login->Status =='3'){
                    throw new Exception("Senha inválida!");                  
                }
            }    
        }
    }  
?>