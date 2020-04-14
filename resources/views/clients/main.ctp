<?php
// Modificacion : 10/07/19 
// Programador : Edgar Gonzalez
//- Se le agrego el atributo a la tabla clientes de color2 y facturar_con_oc
//- Incorporo a la vista nuevos atributos como email, telefonos, 
//- Reubico la accion Nueva Orden y Nuevo Presupuesto 
$this->Html->css('clientes', null, array('inline' => false));
$this->Html->script('clientes.js', array('inline' => false));
////$this->Html->script('panels', array('inline' => false));
$this->Html->script('third/jquery.autocomplete.js', array('inline' => false));

$formOptions = array(
    'inputDefaults' => array(
        'div' => false,
        'class' => 'inline-block'
    ),
);

$isNewClient = $data['Client']['Client']['id'] ? false : true;

?>

<div class="clients form">

    <div id="left-col">   

        <?php echo $this->Form->create('Client', $formOptions); ?>

        <div class="panel-wrapper">

            <!-- Datos de la orden -->
            <div class="panel vertical datos-cliente opened">
                <div class="panel-body">
                    <div class="panel-title">
                        Datos del cliente
                    </div>           
                    <div class="panel-content">
                        <!-- ID y RUT Cliente -->
                        <?php
                            echo $this->Form->input('id', array(
                                    'label' => 'ID',
                                    'readonly' => 'readonly',
                                    'type' => 'text',
                                    'enabled' => $isNewClient ? "0" : "1",
                                    'value' => $data['Client']['Client']['id']
                                ));
                            if(AuthComponent::user('role') != 'cliente'){
                                    echo $this->Form->button('', array(
                                        'id' => 'search-client',
                                        'type' => 'button',
                                        'onclick' => 'openClientSearchBox();',
                                        'class' => 'r-float'
                                    ));
                            }
               				echo $this->Form->input('rut', array(
                                    'label' => 'RUT',
                                    'value' => $data['Client']['Client']['rut'],
                                    'class' => 'r-float'
                                ));
                            echo $this->Form->input('razon_social', array(
                                'label' => 'Razón social',
                                'class' => 'r-float',
                                'value' => $data['Client']['Client']['razon_social'],
                                'div' => array('class' => 'fields-row')
                            ));
                            echo $this->Form->input('nombre_fantasia', array(
                                'label' => 'Nombre fantasía',
                                'class' => 'r-float',
                                'div' => array(
                                'class' => 'fields-row'),
                                'value' => $data['Client']['Client']['nombre_fantasia']
                            ));
                            echo $this->Form->input('direccion_fiscal', array(
                                'label' => 'Dirección',
                                'class' => 'r-float',
                                'div' => array(
                                'class' => 'fields-row'),
                                'value' => $data['Client']['Client']['direccion_fiscal']
                            ));
                            echo $this->Form->input('refiere', array(
                                'label' => 'Grupo/Refiere',
                                'value' => $data['Client']['Client']['refiere'],
                                'class' => 'r-float',
                                'div' => array(
                                    'class' => 'fields-row'
                                ),
                            ));
                            ?>
                            <?php
                            echo $this->Form->input('email', array(
                                'label' => 'Web',
                                'value' => $data['Client']['Client']['email'],
                                'class' => 'r-float width-medium',
                                'div' => array(
                                    'class' => 'fields-row'
                                )
                            ));
                            ?>
                            <?php
                            echo $this->Form->input('telefono', array(
                                'label' => 'Teléfono',
                                'value' => $data['Client']['Client']['telefono'],
                                'class' => 'r-float width-medium',
                                'div' => array(
                                    'class' => 'fields-row'
                                )
                            ));
            
                            /** Andres pidio que saquemos este campo de porcentaje.
                             * Lo comento aca para que no aparezca.
                             * 
                            echo $this->Form->input('refiere_porcentaje', array(
                                'label' => false,
                                'type' => 'dtselect',
                                'options' => array('% CRÉDITO', '% CLIENTE', '% COMISIÓN')
                            ));
                            */
                            
                            ?> 
                        <div class="separator"></div>

                        <div class="section-title-bold">Definir contactos
                            <?php
                            echo $this->Form->button('', array(
                                'type' => 'button',
                                'id' => 'add-contact',
                                'class' => 'add',
                                'onclick' => 'addContact();'));
                            ?>
                        </div>

                        <div class="section-title">Contactos agregados</div>

                        <div id="added-contacts">
                            <?php
                            for ($index = 0; $index < count($data['Client']['Contact']); $index++) {
                                $contact = $data['Client']['Contact'][$index];
                                echo $this->element('client_contact', array(
                                    'contact' => $contact,
                                    'index' => $index
                                ));
                            }
                            ?>
                        </div>

                        <div class="separator"></div>

                        <div class="section-title-bold">Entrega</div>
                        <?php
                        echo $this->Form->input('entrega_sugerida', array(
                            'label' => 'Entrega',
                            'class' => 'r-float',
                            'div' => array('class' => 'fields-row'),
                            'type' => 'dtselect',
                            'options' => array(
                                        'Retira de' => 'Retira de',
                                        'Entrega GRAFAL' => 'Entrega GRAFAL',
                                        'Entrega DAC' => 'Entrega DAC',
                                        'Entrega De Punta' => 'Entrega De Punta',
                                        'Entrega COT/COPSA' => 'Entrega COT/COPSA',
                                        'Entrega Red Distr.' => 'Entrega Red Distr.',
                                        'Entrega Otro' => 'Entrega Otro'
                                        ),
                            'default' => $data['Client']['Client']['entrega_sugerida']));
                        
                        ?>

                        <div class="space"></div>
                        <div class="fields-row">
                            <?php
                                echo $this->Form->input('desglosa_envio', array(
                                'label' => 'Desglosa Envio',
                                'type' => 'checkbox',
                                'checked' => ( $data['Client']['Client']['desglosa_envio'] ? 'checked' : '' ),
                            ));
                            echo $this->Form->input('envio', array(
                                'label' => '',
                                'value' => $data['Client']['Client']['envio'],
                                'class' => 'r-float'
                            ));
                            ?>
                        </div>
                        <div class="separator"></div>

                        <div class="section-title-bold">Agregar direcciones
                         <?php
                            echo $this->Form->button('', array(
                                'type' => 'button',
                                'id' => 'add-address',
                                'class' => 'add',
                                'onclick' => 'addAddress();'));
                         ?>
                         </div>
                         <div class="section-title">Direcciones agregadas</div>
                            
                         <div id="added-adresses">
                         <?php
                            for ($index = 0; $index < count($data['Client']['Address']); $index++) {
                                $address = $data['Client']['Address'][$index];
                                echo $this->element('client_address', array(
                                'address' => $address,
                                'index' => $index
                                ));
                             }
                         ?>
                         </div>
                       
                        <div class="separator"></div>
                        <div class="section-title-bold">Administración</div>
                        <?php echo $this->Form->input('ClientPaymentTypeId', array(
                            'label' => 'Facturar con orden de compra ',
                            'type' => 'checkbox',
                            'checked' => ( $data['Client']['Client']['facturar_con_oc'] ? 'checked' : '' ),
                        )); ?>

                        <?php
                        echo $this->Form->input('payment_type_id', array(
                            'label' => 'Forma de pago',
                            'type' => 'dtselect',
                            'options' => $data['PaymentTypes'],
                            'div' => array(
                                'class' => 'fields-row'
                            ),
                            'default' => isset($data['Client']['Client']['payment_type_id']) ? $data['Client']['Client']['payment_type_id'] : 1
                        )); ?>
                        <div class="separator"></div>
                        <div class="section-title-bold">Notas</div>
                        <?php echo $this->Form->input('observaciones', array(
                            'label' => false,
                            'type' => 'textarea',
                            'placeholder' => 'Observaciones administrativas',
                            'value' => $data['Client']['Client']['observaciones']
                        )); ?>
                        <div class="separator"></div>
                        <div class="section-title-bold">Diseño</div>
                        <?php 
                            echo $this->Form->input('enviar_muestra', array(
                                'label' => 'Enviar siempre muestra',
                                'type' => 'checkbox',
                                'checked' => ( $data['Client']['Client']['enviar_muestra'] ? 'checked' : '' ),
                            ));
                            ?>
                            <div class="space"></div>
                            <?php 
                            echo $this->Form->input('color', array(
                                'label' => 'Color institucional',
                                'type' => 'text',
                                'value' => $data['Client']['Client']['color'],
                                'class' => 'r-float'
                            )); 
                            ?>
                            <div class="space"></div>
                            <?php 
                            echo $this->Form->input('color2', array(
                                'label' => 'Composición para Digital',
                                'type' => 'text',
                                'value' => $data['Client']['Client']['color2'],
                                'class' => 'r-float'
                            )); 
                            ?>
                        <div class="separator"></div>
                        <div class="section-title-bold">Producción</div>
                        <?php echo $this->Form->input('produccion', array(
                            'label' => false,
                            'type' => 'textarea',
                            'placeholder' => 'Observaciones Generales',
                            'value' => $data['Client']['Client']['produccion']
                        )); ?>

                    </div>

                </div>
            </div>
        </div>

        <?php
        echo $this->Form->end();
        ?>
    </div>

    <div id="right-col">
        <div class="col-inner">
            <div class="row r1">
                <div class="panel-wrapper">

                    <!-- Ordenes en curso -->
                    <div class="panel vertical ordenes-en-curso opened orders-box">
                        <div class="panel-body">
                            
                            <div id="cliente-ordenes-tabs" class="panel vertical collapsable disenio-orden tareas-orden opened">
                                <ul>
                                    <li><a href="#tabs-ordenes">Ordenes en Curso</a></li>
                                    <li class="<?php echo (count($data["Presupuestos"]['Orders']) > 0 ? 'state-success' : ''); ?>">
                                        <a href="#tabs-presupuestos">Presupuestos</a>  
                                    </li>                                        
                                </ul>

                                <div id="tabs-ordenes" class="panel-body">
                                    <div class="panel-content">
                                        <div class="grid">
                                            <?php
                                            echo $this->element('orders_box_inprogress', array(
                                                'orders' => $data["OrdersInProgress"]['Orders']
                                            ));
                                            ?>
                                        </div>                                        
                                    </div>
                                </div>
                                
                                <div id="tabs-presupuestos" class="panel-body">
                                    <div class="panel-content">
                                        <div class="grid">
                                            <?php
                                            echo $this->element('orders_box_inprogress', array(
                                                'orders' => $data["Presupuestos"]['Orders']
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row r2">
                <div class="panel-wrapper">

                    <!-- Ordenes finalizadas -->
                    <div class="panel vertical historial-ordenes opened orders-box">
                        <div class="panel-body">
                            <div class="panel-title">
                                Historial de ordenes
                            </div>
                            <div class="panel-content">
                                <div class="grid">
                                    <?php
                                    echo $this->element('orders_box_history', array(
                                        'orders' => $data['OrdersHistory']['Orders'],
                                        'filters' => $data['OrdersHistory']['filters'],
                                        'clientId' => $data['Client']['Client']['id']
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Fin de paneles -->

</div>

<div id="form-actions"> 
    <?php
    echo $this->Form->submit('Guardar', array(
        'div' => false,
        'name' => 'save',
        'class' => 'action-button main',
        'id' => 'save-btn'));
    ?>
    <?php
    echo $this->Html->link('Crear Orden', '/orders/main/?clientId=' . $data['Client']['Client']['id'],
        array(
            'class' => 'action-button r-float',
            'id' => 'create-btn',
            'style' => 'margin: 0px 15px 0px 6px;'
        ));
    ?>

    <?php
    echo $this->Html->link('Crear Presupuesto', '/orders/PresupuestosNew/?clientId=' . $data['Client']['Client']['id'],
        array(
            'class' => 'action-button r-float',
            'id' => 'create-presupuesto'
        ));
    ?>   
</div>

<?php
echo $this->element('search_client',array('controller' => 'clients/main/'));
?>
<?php

$formData = $this->Js->get('#ClientMainForm')->serializeForm(array(
    'isForm' => true,
    'inline' => true));

$this->Js->get('#save-btn')->event('click', $this->Js->request(
                array(
            'action' => 'save',
            'controller' => 'clients'), array(
            'success' => 'onSubmitSuccess(data);',
            'error' => 'onAjaxError();',
            'data' => $formData,
            'type' => 'json',
            'async' => true,
            'dataExpression' => true,
            'method' => 'POST')));

?>
<script type="text/javascript">
    $("#cliente-ordenes-tabs").tabs();
</script>
