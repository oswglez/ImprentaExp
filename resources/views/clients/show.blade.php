<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Imprenta Express</title>
	<link href="/favicon.ico" type="image/x-icon" rel="icon">
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="/css/jquery/flick/jquery-ui-1.10.4.custom.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/imprenta.css">
	<link rel="stylesheet" type="text/css" href="/css/jqueryui-editable.css">
	<link rel="stylesheet" type="text/css" href="/css/clientes.css">
	<script type="text/javascript" src="/js/third/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/js/third/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="/js/third/underscore.js"></script>
	<script type="text/javascript" src="/js/third/sprintf.min.js"></script>
	<script type="text/javascript" src="/js/utils.js"></script>
	<script type="text/javascript" src="/js/layout.js"></script>
	<script type="text/javascript" src="/js/notification_center.js"></script>
	<script type="text/javascript" src="/js/third/jqueryui-editable.min.js"></script>
	<script type="text/javascript" src="/js/clientes.js"></script>
	<script>
		var BASE_URL = "/";
	</script>
<!-- 	<style type="text/css">
		*{bcontact: 1px solid red;padding: 20px;}
	</style> -->
</head>

<body style="">
	<h2>
		<?php 
		
			use App\client;
			use App\contact;
			use App\order; 

            $contacts = $client->contacts; 
            echo ($contacts);
		//	$orders = $client->orders; 
		?>
	</h2>
	<div id="container">
		<div id="search-bar"></div>
		<!-- Header desplegable -->
		<div id="header" class="clearfix animated" style="top: -130px;">
			<div id="header-logo" class="hidden visible-xs">
				<img class="center-block logo-mobile" src="/img/express.png" alt="Logotipo">                
			</div>
			<div id="header-logo" class="hidden-xs">
				<img src="/img/express.png" alt="Logotipo">                
			</div>
			<div id="top-menu">
				<div id="top-menu-inner">
					<div class="menu-option ordenes ">
						<a href="#/contacts/presupuestos">
							<div class="icon"></div>
							<div class="caption">Presupuestos</div>
						</a>
					</div>
					<div class="menu-option ordenes">
						<a href="#contacts/">
							<div class="icon"></div>
							<div class="caption">Ordenes</div>
						</a>
					</div>
					<div class="menu-option clientes current">
						<a href="#clients/">
							<div class="icon"></div>
							<div class="caption">Clientes</div>
						</a>

					</div>
					<div class="menu-option admin ">
						<a href="#users/admin">
							<div class="icon"></div>
							<div class="caption">Admin</div>
						</a>
					</div>
					<div class="menu-option caja ">
						<a href="#clients/caja/-1">
							<div class="icon"></div>
							<div class="caption">Caja</div>
						</a>
					</div>
					<div class="menu-option admin">
						<a href="#users/logout">
							<div class="icon"></div>
							<div class="caption">Salir</div>
						</a>
					</div>
				</div>
			</div>
			<div id="top-tools" class="clearfix">
				<ul>
					<li><a href="detalle.html"><i class="nuevo"></i></a></li>                    
				</ul>
			</div>
		</div>
			<div id="content" class="clearfix" >
				<div id="flashMessage" style="top: -40px;">
					<div id="flashMessageWrapper"></div>
				</div>

				<div class="clients form row">

					<!-- COLUMNA IZQUIERDA -->
					<div id="left-col" class="col-sm-6 col-md-3">
						<form action="clients/main/24" id="ClientMainForm" method="post" accept-charset="utf-8">
							<div style="display:none;">
								<input type="hidden" name="_method" value="POST">
							</div>
							<div class="panel-wrapper">
								<!-- Datos de la orden -->
								<div class="panel vertical datos-cliente opened">
									<div class="panel-body">
										<div class="panel-title">
											Datos del cliente
										</div><!-- /*panel-title -->
										<div class="panel-content">
											<!-- ID y RUT Cliente -->
											<div class="fields-row row">			
												<div class="col-auto">
													<label for="Clientid">ID</label>
													<input name="Clientid" class="inline-block" readonly="readonly" enabled="1" value="{{$client->id}}" type="text" id="ClientId"> 
											  </div><!-- /*col -->
												
											  <div class="col">
													<div class="input-group">
											  		<label for="ClientRut">RUT</label>
													  <input id="ClientRut" name="data[Client][rut]" class="form-control" type="text" maxlength="64" value="{{$client->rut}}">
													  <span class="input-group-addon">
														<button id="search-client" type="button" onclick="openClientSearchBox();" class="" style="height: 25px;"></button>
													  </span>
													</div>
											  </div><!-- /*col -->
											</div><!-- /*ID y RUT Cliente -->

											<!-- Razón social -->
											<div class="fields-row row">
												<label for="ClientRazonSocial" class="col-auto">Razón social</label>
												<input name="data[Client][razon_social]" class="form-control col" value="{{$client->razon_social}}" maxlength="45" type="text" id="ClientRazonSocial">
											</div><!-- /*Razón social -->

											<!-- Nombre fantasía -->
											<div class="fields-row row">
												<label for="ClientNombreFantasia" class="col-auto">Nombre fantasía</label>
												<input name="data[Client][nombre_fantasia]" class="form-control col" value="{{$client->nombre_fantasia}}" maxlength="45" type="text" id="ClientNombreFantasia">
											</div><!-- /*Nombre fantasía -->

											<!-- Dirección fiscal-->
											<div class="fields-row row">
												<label for="ClientDireccionFiscal" class="col-auto">Dirección fiscal</label>
												<input name="data[Client][direccion_fiscal]" class="form-control col" value="{{$client->direccion_fiscal}}" maxlength="80" type="text" id="ClientDireccionFiscal">
											</div><!-- /*Dirección fiscal -->

											<!-- Grupo/Refiere-->
											<div class="form-group fields-row row required">
												<label class="col-auto" for="ClientRefiere">Grupo/Refiere</label>
												<div class="dropdown col" id="ClientRefiere">
													<select name="data[contact][work_type_id]" class="col" id="ClientRefiere2" required="required">
														<option value="0">{{$client->refiere}}</option>
													</select>
												</div>
											</div><!-- /*Grupo/Refiere -->

											<!-- Dirección web-->
											<div class="fields-row row">
												<label for="ClientDireccionWeb" class="col-auto">Web</label>
												<input name="data[Client][direccion_web]" class="form-control col" value="no-en-bd" type="text" id="ClientDireccionWeb">
											</div><!-- /*Dirección web -->

											<!-- Teléfono-->
											<div class="fields-row row">
												<label for="ClientTelf" class="col-auto">Teléfono</label>
												<input name="data[Client][telefono]" class="form-control col" value="{{$client->telefono}}" type="text" id="ClientTelf">
											</div><!-- /*Teléfono -->

											<div class="separator"></div>

											<!-- Definir contactos -->
											<div class="section-title-bold">Definir contactos
												<button type="button" id="add-contact" class="add" onclick="addContact();"></button>
											</div>

											<!-- ******* Agregar y editar contactos -->
											<div id="added-contacts">
												<?php 
												$contacts  		= $client->contacts;
												$addresses 		= $client->addresses;
												$orders		 	= $client->orders; 	
												?>
									@foreach($contacts as $contact)

												<!-- Contactos -->
												<div class="added-contact">
													<div class="row">
														<div class="col-auto">
															<button type="button" class="remove remove-contact" title="Borrar" onclick="if(confirm(&#39;¿Realmente desea quitar el contacto seleccionado?&#39;)){removeContact(1);}"></button>
															<button type="button" class="edit edit-contact" title="Editar" onclick="editContact1.open();"></button>															
														</div>
														<div class="col">
															<span class="name">{{$contact->nombre}}></span>
														</div>
														<!-- Modal Editar contacto -->
														<div class="popup edit-contacto contact-0">
															<script>
																var editContact1 = new EditContact(1, onContactEditDone);
															</script>
															<div class="mask"></div>
															<div class="box">
																<div class="popup-title">Contacto</div>
																<div class="popup-body">
																	<input type="hidden" name="data[Contact][1][id]" class="inline-block" value="1" id="Contact1Id">
																	<input type="hidden" name="data[Contact][1][deleted]" class="inline-block" value="0" id="Contact1Deleted">
																	
																	<div class="fields-row">
																		<label for="Contact1Tipo">Tipo de contacto</label>
																		<div class="dropdown contactTipo col" id="Contact1TipoWrapper">
																			<select class="col" name="data[Contact][1][tipo]" id="Contact1Tipo">
																				<option value=""></option>
																				<option value="0">Contacto principal</option>
																				<option value="1">Responsable</option>
																				<option value="2">Contaduría</option>
																				<option value="3">Administración</option>
																				<option value="4">Otro</option>
																			</select>
																		</div>
																	</div>

																	<div class="fields-row">
																		<input name="data[Contact][1][nombre]" class="contactNombre" placeholder="Nombre" value="LAURA FAUSTINO" maxlength="100" type="text" id="Contact1Nombre">
																	</div>

																	<div class="fields-row">
																		<input name="data[Contact][1][email]" class="contactEmail" placeholder="Email" value="lfaustino@agrosan.com.uy" maxlength="100" type="email" id="Contact1Email">
																	</div>

																	<div class="fields-row">
																		<input name="data[Contact][1][celular]" class="inline-block contactCelular" value="" placeholder="Celular" maxlength="20" type="text" id="Contact1Celular">
																		<input name="data[Contact][1][telefono]" class="inline-block contactTelefono" value="" placeholder="Teléfono" maxlength="20" type="text" id="Contact1Telefono">
																		<input name="data[Contact][1][fax]" class="inline-block contactFax" placeholder="Fax" value="" maxlength="20" type="text" id="Contact1Fax">
																	</div>
																	
																	<div class="fields-row">
																		<input name="data[Contact][1][cargo]" class="inline-block contactCargo" placeholder="Cargo" value="" maxlength="45" type="text" id="Contact1Cargo">
																		<input name="data[Contact][1][horario]" class="inline-block contactHorario" value="" placeholder="Horario" maxlength="100" type="text" id="Contact1Horario">            
																	</div>
																			
																	<div class="fields-row">
																		<input name="data[Contact][1][departamento]" class="inline-block contactDepartamento" value="" placeholder="Depto/Sector" maxlength="30" type="text" id="Contact1Departamento">
																		<input name="data[Contact][1][direccion]" class="inline-block contactDireccion" value="  " placeholder="Dirección" maxlength="100" type="text" id="Contact1Direccion">            
																	</div>

																	<div class="fields-row">Notas</div>

																	<div class="fields-row">
																		<textarea name="data[Contact][1][notas]" class="contactNotas" cols="46" rows="6" id="Contact1Notas"></textarea>
																	</div>
																</div>
															</div>
														</div><!-- /*Modal Editar Contacto -->
													</div><!-- */row -->
												</div>
												<!-- /*Contactos -->
											@endforeach
												
											</div><!-- /*Agregar y editar contactos -->

											<div class="separator"></div>

											<!-- ******* Entrega -->
											<div class="section-title-bold">Entrega</div>

											<div class="fields-row row">
												<label class="col-auto" for="ClientEntregaSugerida">Entrega</label>
												<div class="dropdown r-float col" id="ClientEntregaSugeridaWrapper">
													<select class="col" name="data[Client][entrega_sugerida]" id="ClientEntregaSugerida">
														<option value=""></option>
														<option value="Retira de">Retira de</option>
														<option value="Entrega GRAFAL" selected="selected">Entrega GRAFAL</option>
														<option value="Entrega DAC">Entrega DAC</option>
														<option value="Entrega De Punta">Entrega De Punta</option>
														<option value="Entrega COT/COPSA">Entrega COT/COPSA</option>
														<option value="Entrega Red Distr.">Entrega Red Distr.</option>
														<option value="Entrega Otro">Entrega Otro</option>
													</select>
												</div>
											</div>
											<div class="space"></div>
											<!-- Desglosa Envio -->
											<div class="fields-row row">
												<div class="col-auto">
													<input type="hidden" name="data[Client][desglosa_envio]" id="ClientDesglosaEnvio_" value="0">
													<input type="checkbox" name="data[Client][desglosa_envio]" checked="checked" value="1" id="ClientDesglosaEnvio">
													<label for="ClientDesglosaEnvio">Desglosa Envio</label>
													<label for="ClientEnvio"></label>													
												</div >
												<input name="data[Client][envio]" class="col-auto" value="150" type="number" id="ClientEnvio">
											</div><!-- */Desglosa Envio -->

											<div class="space"></div>

											<!-- Agregar direcciones -->
											<div class="section-title-bold">Agregar direcciones
												<button type="button" id="add-address" class="add" onclick="addAddress();"></button>
											</div>
											
											<div id="added-addresses">
												<!-- Dirección  -->
								
												@foreach($addresses as $addresse)
													<div class="added-address">
														<div class="row">
															<div class="col-auto">
																<button type="button" class="remove remove-address" title="Borrar" onclick="if(confirm(&#39;¿Realmente desea quitar la dirección seleccionada?&#39;)){removeAddress(1);}"></button>
																<button type="button" class="edit edit-address" title="Editar" onclick="editAddress1.open();"></button>															
															</div>
															<div class="col">
															<span class="direccion"> {{$addresse->direccion}} </span>
															</div>
														</div><!-- /*row -->

														<div class="popup edit-direccion address-1">
															<script>
																var editAddress1 = new EditDireccion(1, onAddressEditDone);
															</script>
															<div class="mask"></div>
															<div class="box">
																<div class="popup-title">Dirección</div>
																<div class="popup-body">
																	<input type="hidden" name="data[Address][1][id]" class="inline-block" value="651" id="Address1Id">
																	<input type="hidden" name="data[Address][1][deleted]" class="inline-block" value="0" id="Address1Deleted">

																	<div class="fields-row">
																		<input name="data[Address][1][direccion]" class="direccion" placeholder="Dirección" value="CUAREIM 1958" maxlength="80" type="text" id="Address1Direccion">
																	</div>
																	<div class="fields-row">
																		<input name="data[Address][1][esquina_1]" class="esquina_1" placeholder="Esquina" value="" maxlength="45" type="text" id="Address1Esquina1">
																		<input name="data[Address][1][esquina_2]" class="esquina_2" placeholder="Esquina" value="" maxlength="45" type="text" id="Address1Esquina2">
																	</div>
																	<div class="fields-row">
																		<input name="data[Address][1][ciudad]" class="inline-block ciudad col" placeholder="Ciudad" value="" maxlength="45" type="text" id="Address1Ciudad">
																		<div class="dropdown inline-block departamento col" id="Address1DepartamentoWrapper">
																			<select name="data[Address][1][departamento]" defaul="" id="Address1Departamento">
																					<option value="">Depto. --</option>
																					<option value="ARTIGAS">Artigas</option>
																					<option value="CANELONES">Canelones</option>
																					<option value="CERRO LARGO">Cerro Largo</option>
																					<option value="COLONIA">Colonia</option>
																					<option value="DURAZNO">Durazno</option>
																					<option value="FLORES">Flores</option>
																					<option value="FLORIDA">Florida</option>
																					<option value="LAVALLEJA">Lavalleja</option>
																					<option value="MALDONADO">Maldonado</option>
																					<option value="MONTEVIDEO">Montevideo</option>
																					<option value="PAYSANDU">Paysandú</option>
																					<option value="RIO NEGRO">Río Negro</option>
																					<option value="RIVERA">Rivera</option>
																					<option value="ROCHA">Rocha</option>
																					<option value="SALTO">Salto</option>
																					<option value="SAN JOSE">San José</option>
																					<option value="SORIANO">Soriano</option>
																					<option value="TACUAREMBO">Tacuarembó</option>
																					<option value="TRENTA Y TRES">Treinta y Tres</option>
																			</select>
																		</div>
																		<input name="data[Address][1][codigo_postal]" class="inline-block codigoPostal" placeholder="CP" value="" maxlength="45" type="text" id="Address1CodigoPostal">
																	</div>
																	<div class="fields-row">Notas</div>
																	<div class="fields-row">
																		<textarea name="data[Address][1][notas]" class="notas" cols="43" rows="6" id="Address1Notas"></textarea>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<!-- Dirección  -->
												@endforeach
											</div><!-- /*Agregar direcciones -->
											<!-- /*Entrega -->

											<div class="separator"></div>

											<!-- ******* Administración -->
											<div class="section-title-bold">Administración</div>

											<!-- Facturar con orden de compra -->
											<div class="fields-row row">
												<input class="col-auto" type="checkbox" name="data[Client][facturar_con_oc]" checked="" value="1" id="ClientFacturarConOc">
												<label class="col-auto" for="ClientFacturarConOc">Facturar con orden de compra</label>
											</div><!-- */Facturar con orden de compra -->

											<!-- Forma de pago -->
											<div class="fields-row">
												<label for="ClientPaymentTypeId">Forma de pago</label>
												<div class="dropdown inline-block col" id="ClientPaymentTypeIdWrapper">
													<select class="col" name="data[Client][payment_type_id]" id="ClientPaymentTypeId">
														<option value=""></option>
														<option value="1">CONTADO</option>
														<option value="2" selected="selected">CRÉDITO 30 DÍAS</option>
														<option value="3">CRÉDITO 60 DÍAS</option>
														<option value="4">CRÉDITO 5 DÍAS</option>
														<option value="5">CRÉDITO 10 DÍAS</option>
														<option value="6">CRÉDITO 90 DÍAS</option>
														<option value="7">CRÉDITO 0 DÍAS</option>
													</select>
												</div>
											</div><!-- */Forma de pago -->
											<!-- Notas -		Voy x aqui mosca	
																				-->
											<div class="form-group">
												<label for="ClientObservaciones">Notas</label>
												<input name="data[Client][observaciones]" class="form-control col" value="{{ $client-> observaciones }}" maxlength="50" type="text" id="ClientObservaciones">
											<!--	<textarea class="form-control" style="padding: 5px;" name="data[Client][observaciones]" rows="1" placeholder="Observaciones administrativas" id="ClientObservaciones" ></textarea> -->
											</div><!-- /*Notas -->

											<!-- /*Administración -->

											<div class="separator"></div>

											<!-- ******* Diseño -->
											<div class="section-title-bold">Diseño</div>
											<input type="hidden" name="data[Client][enviar_muestra]" id="ClientEnviarMuestra_" value="{{ $client-> enviar_muestra }}">
											<input type="checkbox" name="data[Client][enviar_muestra]" class="inline-block" value="1" id="ClientEnviarMuestra">
											<label for="ClientEnviarMuestra">Enviar siempre muestra</label>

											<!-- Color institucional -->
											<div class="fields-row row">
												<label class="col-auto" for="ClientColor">Color institucional</label>
												<input name="data[Client][color]" class="form-control col" value="{{ $client-> color }}" maxlength="50" type="text" id="ClientColor">
											</div>
											<!-- /*Color institucional -->

											<!-- Composición para Digital -->
											<div class="fields-row row">
												<label class="col-auto" for="ClientColor2">Composición para Digital</label>
												<input name="data[Client][color2]" class="form-control col" value="{{ $client-> color2 }}" maxlength="100" type="text" id="ClientColor2">
											</div>
											<!-- /*Composición para Digital -->
											<!-- /*Diseño -->

											<div class="separator"></div>

											<!-- Producción -->
											<div class="section-title-bold">Producción</div>
											<input name="data[Client][produccion]" class="form-control col" value="{{ $client-> produccion }}" maxlength="50" type="text" id="ClientProduccion">
											<!-- <textarea name="data[Client][produccion]" class="form-control" style="padding: 5px;" placeholder="Observaciones Generales" rows="6" id="ClientProduccion"></textarea> -->
											<div class="separator"></div>
											<!-- /*Producción -->
											<div id="form-actions">
												<input name="save" class="action-button main" id="save-btn" type="submit" value="Guardar">
											</div>
										</div><!-- /*panel-content -->
									</div><!-- /*panel-body -->
								</div><!-- /*Datos de la orden -->
							</div><!-- /*panel-wrapper -->
						</form>
					</div><!-- /*COLUMNA IZQUIERDA -->

					<!-- COLUMNA DERECHA -->
					<div id="right-col" class="col-sm-6 col-md-8">
						<div class="col-inner">
							<div class="row r1">
								<div class="panel-wrapper">
									<!-- Ordenes en curso -->
									<div class="panel vertical ordenes-en-curso opened contacts-box">
										<div class="panel-body">
											<div class="panel-title">Ordenes en curso</div>
											<div class="panel-content">
												<div class="grid">
													<span class="no-results">No existen ordenes para este cliente</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row r2">
								<div class="panel-wrapper">
									<!-- Ordenes finalizadas -->
									<div class="panel vertical historial-ordenes opened contacts-box">
										<div class="panel-body">
											<div class="panel-title">Historial de ordenes</div>
											<div class="panel-content">
												<div class="grid">
													<form action="clients/main/24" id="contactsHistoryBoxForm" class="historial-ordenes-form" onsubmit="event.returnValue = false; return false;" method="get" accept-charset="utf-8">
														<table cellspacing="0" class="contacts-box-history">
															<thead>
																<tr>
																	<th><a href="contacts/contactsBoxHistory/24/sort:numero/direction:asc" id="link-2122686039">Orden</a></th>
																	<th><a href="contacts/contactsBoxHistory/24/sort:created/direction:asc" class="desc" id="link-669628209">Fecha</a></th>
																	<th><a href="contacts/contactsBoxHistory/24/sort:cantidad_copias/direction:asc" id="link-1330474719">Cantidad</a></th>
																	<th><a href="contacts/contactsBoxHistory/24/sort:WorkType.descripcion/direction:asc" id="link-1356407839">Trabajo</a></th>
																	<th><a href="contacts/contactsBoxHistory/24/sort:WorkSubtype.descripcion/direction:asc" id="link-1014294193">Subtipo</a></th>
																	<th><a href="contacts/contactsBoxHistory/24/sort:descripcion/direction:asc" id="link-666966176">Descripción</a></th>
																	<th>Formato</th>
																	<th>Cant. Tintas</th>
																	<th>Importe $</th>
																	<th>Importe USD</th>
																	<th>Num. Fact.</th>
																	<th>Fecha Fact.</th>
																	<th>Fecha pago</th>
																</tr>
															</thead>
															<tbody>
															
																	@foreach ($orders as $order)
																		<tr>
									
																			<td><a href=  "{{ route('orders.show', $order->id)}}">{{ $order->numero}}</a>&nbsp;</td> 
																			<td>{{$order->fecha_terminacion}}&nbsp;</td>
																			<td>{{$order->cantidad_copias}}&nbsp;</td>
																			<td>{{$order->work_type->descripcion}}&nbsp</td>
                															<td>{{$order->work_subtype->descripcion}}&nbsp</td>
                    														<td>{{$order->descripcion}}&nbsp</td>			
																			<td>21 x 14 x 0&nbsp;</td>
																			<td>1&nbsp;</td>
																			<td>
																				{{$order->total_su}}&nbsp;</td>
																			<td>
																			---&nbsp;</td>
																			<td>{{$order->total_usd}}&nbsp;</td>
																			<td>08/02/18&nbsp;</td>
																			<td>08/02/18&nbsp;</td>
																		</tr>
																	@endforeach
															
																
															</tbody>
														</table>
														<div class="nav">
															<span class="prev disabled">&lt; Anterior</span>
															<span class="current">1</span>
															<span><a href="clients/main/24/page:2" id="link-630790160">2</a></span>
															<span><a href="clients/main/24/page:3" id="link-952400708">3</a></span>
															<span><a href="clients/main/24/page:4" id="link-1875834036">4</a></span>
															<span class="next"><a href="contacts/contactsBoxHistory/24/page:2" id="link-2025375849" rel="next">Siguiente &gt;</a></span>
														</div>
													</form>
													<script type="text/javascript">
														//<![CDATA[
														$(document).ready(function () {$("#link-2122686039").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/sort:numero\/direction:asc"});
															return false;});
														$("#link-669628209").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/sort:created\/direction:asc"});
															return false;});
														$("#link-1330474719").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/sort:cantidad_copias\/direction:asc"});
															return false;});
														$("#link-1356407839").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/sort:WorkType.descripcion\/direction:asc"});
															return false;});
														$("#link-1014294193").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/sort:WorkSubtype.descripcion\/direction:asc"});
															return false;});
														$("#link-666966176").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/sort:descripcion\/direction:asc"});
															return false;});
														$("#link-630790160").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/clients\/main\/24\/page:2"});
															return false;});
														$("#link-952400708").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/clients\/main\/24\/page:3"});
															return false;});
														$("#link-1875834036").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/clients\/main\/24\/page:4"});
															return false;});
														$("#link-2025375849").bind("click", function (event) {$.ajax({dataType:"html", evalScripts:true, success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, url:"\/contacts\/contactsBoxHistory\/24\/page:2"});
															return false;});
														$("#contactsHistoryBoxForm").bind("submit", function (event) {$.ajax({async:true, data:$("#contactsHistoryBoxForm").serialize(), dataType:"html", success:function (data, textStatus) {$(".panel.historial-ordenes .grid").html(data);}, type:"GET", url:"\/contacts\/contactsBoxHistory\/24"});
															return false;});});
														//]]>
													</script>

													<script type="text/javascript">
														$(".contacts-box-history input").keypress(function(event) {
															if (event.which === 13) {
																event.preventDefault();
																$("form.historial-ordenes-form").submit();
															}
														});
													</script>
												</div><!-- /*grid -->
											</div><!-- /*panel-content -->
										</div><!-- /*panel-body -->
									</div><!-- /*panel vertical historial-ordenes -->
									<!-- /*Ordenes finalizadas -->
								</div><!-- /*panel-wrapper -->
							</div><!-- /*row r2 -->
						</div><!-- /*col-inner -->
					</div><!-- /*right-col -->
					<!-- /*COLUMNA DERECHA -->
				
				<!-- Modal buscar cliente -->
				<div id="client-search-box" class="popup">
					<div class="mask"></div>
					<div class="box">
						<div class="popup-title">Búsqueda de cliente</div>
						<div class="popup-body">
							<input id="URL_SALVADORA" value="clients/main/" type="hidden">
							<form action="clients/main/24" id="ClientSearchBoxForm" onsubmit="event.returnValue = false; return false;" method="post" accept-charset="utf-8">
								<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
								<div class="fields">
									<div class="input text">
										<label for="ClientNombreFantasia">Nombre Fantasia</label>
										<input name="data[Client][nombre_fantasia]" class="clearfix" maxlength="45" type="text" id="ClientNombreFantasia">
									</div>
									<div class="input text">
										<label for="ClientRazonSocial">Razon Social</label>
										<input name="data[Client][razon_social]" class="clearfix" maxlength="45" type="text" id="ClientRazonSocial">
									</div>
									<div class="input text">
										<label for="ClientRut">Rut</label>
										<input name="data[Client][rut]" class="clearfix" maxlength="64" type="text" id="ClientRut">
									</div>
									<div class="input text">
										<label for="ClientRefiere">Refiere</label>
										<input name="data[Client][refiere]" class="clearfix" maxlength="80" type="text" id="ClientRefiere">
									</div>
									<div class="submit">
										<input class="action-button" type="submit" value="Buscar">
									</div>
								</div>
								<div id="client-search-box-results"><div>
							</form>
						</div>
					</div>
				</div>
				<!-- Modal buscar cliente -->

				</div><!-- /*clients form -->
			</div><!-- /*content -->
			<script type="text/javascript">
				//<![CDATA[
				$(document).ready(function () {$("#ClientSearchBoxForm").bind("submit", function (event) {$.ajax({async:true, data:$("#ClientSearchBoxForm").serialize(), dataType:"html", success:function (data, textStatus) {$("#client-search-box-results").html(data);}, type:"GET", url:"\/clients\/searchBox"});
					return false;});});
				//]]>
			</script>
	</div><!-- /*container -->
	<script>
		var openClientSearchBox = function() {
		$('#client-search-box').fadeIn({speed: 'fast'});
		$('#client-search-box .mask').click(closeClientSearchBox);
		$('div.input:nth-child(1) > input:nth-child(2)').focus();
		onESCPressed(closeClientSearchBox);
		};
		var closeClientSearchBox = function() {
		$('#client-search-box .mask').unbind();
		$('#client-search-box').fadeOut({speed: 'fast'});
		};
		/*
		var detalleCliente = function(userId) {
		if (confirm("Usted está a punta de abandonar esta pantalla. Las modificaciones que no fueron guardadas se perderán. ¿Desea abandonar esta pantalla?")) {
		window.location.href = BASE_URL+'clients/main/'+userId;
		}
		};*/
		/*
		var detalleCliente = function(userId) {

		if (confirm("Usted está a punta de abandonar esta pantalla. Las modificaciones que no fueron guardadas se perderán. ¿Desea abandonar esta pantalla?")) {
		window.location.href = BASE_URL+'clients/main/'+userId;
		}
		};*/
	</script>

	<div id="gns-bar" style="
	overflow: visible;
	position: fixed;
	bottom: 0px;
	left: 0px;
	margin-left: 90px; 
	background-color: #D11010;
	color: #FFF;
	padding: 10px;
	font-weight: 600;
	font-size: 14px;">
		Facturación Electrónica Desactivada! <button type="button" onclick="activar()">Activar</button>
	</div>
	<script type="text/javascript">
		function activar(){
		$.ajax({
		url: BASE_URL + "settings/settingUpdate/FACTURACION_ELECTRONICA/1",
		method: "GET",
		success: function(html){
		$("#gns-bar").remove();
		alert("Has activado la conexión con el modulo de Facturación Electrónica de GNS+ correctamente.");
		},
		error: function(err){
		alert(err);
		}
		});
		}
	</script>            
	<div style="display:none" class="upload_container" id="upload_container_overlay"></div>
	<div style="display:none" class="upload_progress" id="upload_container">
		<div class="progressWindow">Procesando, por favor espere ...</div>
		<img src="/img/ajax-loader.gif" alt="">
	</div>
	<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function () {$("#save-btn").bind("click", function (event) {$.ajax({async:true, data:$("#ClientMainForm").serialize(), dataType:"json", error:function (XMLHttpRequest, textStatus, errorThrown) {onAjaxError();}, success:function (data, textStatus) {onSubmitSuccess(data);}, type:"POST", url:"\/clients\/save"});
		return false;});});
		//]]>
		function setTextareaHeight(textareas) {
		textareas.each(function () {
		var textarea = $(this);

		if ( !textarea.hasClass('autoHeightDone') ) {
		textarea.addClass('autoHeightDone');

		var extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')), // to set total height - padding size
		h = textarea[0].scrollHeight - extraHeight;

		// init height
		textarea.height('auto').height(h);

		textarea.bind('keyup', function() {

		textarea.removeAttr('style'); // no funciona el height auto

		h = textarea.get(0).scrollHeight - extraHeight;

		textarea.height(h+'px'); // set new height
		});
		}
		})
		}
		$(function(){
		setTextareaHeight($('textarea'));
		})
	</script>
</body>
</html>