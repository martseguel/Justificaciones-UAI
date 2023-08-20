<body class="backgroundGradient">
    <div class="dvMainPage">
        <div class="dvHeaderTop">
            <div class="dvTopHeaderContainer">
                <div class="dvBackgroundImage">
                </div>
                <div class="dvLogoUaiIntranetHeader">
                    <img src="../imgs/logo2.png" height="50px">
                </div>
                <div class="headerUserTransContainer">
                    <div class="headerUserTrans">
                        <div class="headerUserTransBottom">
                        </div>
                    </div>
                    <div class="headerUserOpac">
                        <div class="dvUsuarioIntranet">
                            <b>Usuario: </b>
                            <span id="ctl00_txtUserLog"><?php echo $_SESSION['nombre']?></span>
                        </div>
                        <div class="botonSalirIntranet" id="linksToInsert">
                            <a href="../utils/logout.php" class="salir" title="Salir">•Salir•</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="dvMenuContainer" style="text-align:center;">
                <div class="dvMenuIntranet" style="text-align:center;">
                </div>
                <div style="clear: left;"></div><a id="ctl00_Menu1_SkipLink"></a>
            </div>
        </div>
    </div>
    <div class="dvButtonLeftHide"></div>

    </div>
    <div class="dvContentMain">

        <div id="mcs3_container" style="height: 511px; display: block;">
            <div class="customScrollBox">
                <div class="container" style="top: 0px;">
                    <div class="content">
                        <div id="DivAlumnoLog">
                        </div>
                        <div class="RadAjaxPanel" id="ctl00_ctl00_RadAjaxPanel1Panel">
                            <div id="ctl00_RadAjaxPanel1">
                                <!-- 2014.1.403.45 -->

                                <div id="ctl00_wucHorario1_RadToolTipManager1"
                                    style="font-size:18px;text-align:center;font-family:Arial;z-index:99999;display:none;position:absolute;">
                                    <div id="ctl00_wucHorario1_RadToolTipManager1RTMPanel">

                                    </div><input id="ctl00_wucHorario1_RadToolTipManager1_ClientState"
                                        name="ctl00_wucHorario1_RadToolTipManager1_ClientState" type="hidden">
                                </div>
                                <div>
                                    <center>
                                        <table class="TableCalendar" cellspacing="0" cellpadding="0"
                                            style="border-collapse:collapse;">
                                            <tbody>
                                                <tr>
                                                    <td class="HeaderCalendar" colspan="7">HORARIO</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="Daycalendar">L</td>
                                                    <td class="Daycalendar">M</td>
                                                    <td class="Daycalendar">M</td>
                                                    <td class="Daycalendar">J</td>
                                                    <td class="Daycalendar">V</td>
                                                    <td class="Daycalendar">S</td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_1" class="HourCalendar">M1A</td>
                                                    <td id="ctl00_wucHorario1_1_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_1_2" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_1_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_1_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_1_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_1_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_163" class="HourCalendar">M1B</td>
                                                    <td id="ctl00_wucHorario1_163_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_163_2" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_163_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_163_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_163_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_163_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_2" class="HourCalendar">M2</td>
                                                    <td id="ctl00_wucHorario1_2_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_2_2" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_2_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_2_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_2_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_2_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_3" class="HourCalendar">M3</td>
                                                    <td id="ctl00_wucHorario1_3_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_156203_2_3" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">FISICA</td>
                                                    <td id="ctl00_wucHorario1_3_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_156179_4_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_3_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_3_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_4" class="HourCalendar">M4A</td>
                                                    <td id="ctl00_wucHorario1_4_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_156204_2_4" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">CALCULO</td>
                                                    <td id="ctl00_wucHorario1_4_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_156180_4_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_4_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_4_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_254" class="HourCalendar">M4B</td>
                                                    <td id="ctl00_wucHorario1_254_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_254_2" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_254_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_254_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_254_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_254_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_5" class="HourCalendar">M5</td>
                                                    <td id="ctl00_wucHorario1_160965_1_5" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">FISICA</td>
                                                    <td id="ctl00_wucHorario1_160938_2_5" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">CORE</td>
                                                    <td id="ctl00_wucHorario1_160968_3_5" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">CALCULO</td>
                                                    <td id="ctl00_wucHorario1_160951_4_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_5_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_5_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_6" class="HourCalendar">M6</td>
                                                    <td id="ctl00_wucHorario1_160966_1_6" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">FISICA</td>
                                                    <td id="ctl00_wucHorario1_160939_2_6" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">CORE</td>
                                                    <td id="ctl00_wucHorario1_160969_3_6" class="CellModule2"
                                                        style="background-color:DeepSkyBlue;">CALCULO</td>
                                                    <td id="ctl00_wucHorario1_160952_4_6" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_6_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_6_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_7" class="HourCalendar">M7</td>
                                                    <td id="ctl00_wucHorario1_160967_1_7" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_7_2" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_7_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_7_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_7_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_7_6" class="CellModule"></td>
                                                </tr>
                                                <tr>
                                                    <td id="ctl00_wucHorario1_8" class="HourCalendar">M8</td>
                                                    <td id="ctl00_wucHorario1_8_1" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_8_2" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_8_3" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_8_4" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_8_5" class="CellModule"></td>
                                                    <td id="ctl00_wucHorario1_8_6" class="CellModule"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="tableHorarioSombra" cellspacing="0" cellpadding="0"
                                            style="border-collapse:collapse;">
                                            <tbody>
                                                <tr>
                                                    <td class="tdHorarioSombraLeft">&nbsp;</td>
                                                    <td class="tdHorarioSombraMiddle">&nbsp;</td>
                                                    <td class="tdHorarioSombraRight">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </center>
                                </div>

                                <div id="ctl00_wucHorario1_Flyout1_contentbox"><a style="display: none;"></a><iframe
                                        src="javascript:'<html></html>'" frameborder="0" scrolling="no"
                                        id="ctl00_wucHorario1_Flyout1_if"
                                        style="position: absolute; background-color: white; overflow: hidden; opacity: 0; width: 90px; height: 50px; z-index: 0; display: none; top: 0px; left: -45px;"></iframe>
                                    <div id="ctl00_wucHorario1_Flyout1_pv"
                                        style="position: absolute; background-color: transparent; width: 90px; height: 50px; z-index: 1; display: none; top: 0px; left: -45px;">
                                        <div id="ctl00_wucHorario1_Flyout1_e"
                                            style="background-color: transparent; width: 90px; height: 50px;">
                                            <div id="ctl00_wucHorario1_Flyout1_ct">
                                                <div style="height: 50px">
                                                    <center>
                                                        <table id="tblFlyout" width="90px"
                                                            style="background-color: White; color: #494949;
                                            border: solid 1px Gray; text-align: left; cursor: default; font-size: 10px;">
                                                            <tbody>
                                                                <tr style="border: solid 1px black">

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="ctl00_Menu2_pnlMenuOperativo">
                            <div class="dvMenuOperativoIntranet">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center;">
                                                <div class="dvTituloInformaciones">
                                                    MENU OPERATIVO
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>


                        <div id="ResumenOperativo">


                            <div class="dvResumenOperativo">
                                <table style="width: 230px;">
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center;">
                                                <div class="dvTituloInformaciones">
                                                    RESUMEN OPERATIVO
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span
                                                    id="ctl00_ContentPlaceHolder2_wucResumenOperativo1_txtResumenOperativo">No
                                                    existen opciones operativas pendientes</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>



                        </div>

                        <div id="dvComunicaciones">
                            <button onclick="__doPostBack('ctl00$btnNoticias','')" id="ctl00_btnNoticias"
                                class="btn btn-default btnComunicaciones">
                                <i class="fa fa-search fa-lg" style="color:#000; margin-right:5px;"></i>Noticias
                            </button>
                            <br>
                            <br>
                            <button onclick="__doPostBack('ctl00$btnDocumentos','')" id="ctl00_btnDocumentos"
                                class="btn btn-default btnComunicaciones">
                                <i class="fa fa-folder fa-lg" style="color:#000; margin-right:5px;"></i>Documentos
                            </button>
                            <br>

                        </div>


                        <div style="clear: both;">
                        </div>
                    </div>
                </div>
                <div class="dragger_container" style="display: none;">
                    <div class="dragger" style="top: 0px; display: none;">
                    </div>
                </div>
            </div>
        </div>
        <div class="dvContentLeft" style="display: block;">
        </div>
