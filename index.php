<?php
/**
 * Plugin Name: cartepvctwo
 * Plugin URI: null
 * Description: recalc prix
 * Version: 1.0.0
 * Author: Automattic
 * Author URI: null
 * Requires PHP: 5.0
  */

  define('VER','1.0.0');
function addjquery(){
	wp_enqueue_script( 'addjquery',plugin_dir_url( __FILE__ ).'js/jquery.min.js','',VER );
}
add_action("wp_enqueue_scripts", "addjquery");
function bootsjs(){
	wp_enqueue_script( 'bootsjs',plugin_dir_url( __FILE__ ).'js/bootstrap.min.js','',VER );
}
add_action("wp_enqueue_scripts", "bootsjs");

function bootsjsbundle(){
	wp_enqueue_script( 'bootsjsbundle',plugin_dir_url( __FILE__ ).'js/bootstrap.bundle.min.js','',VER );
}
add_action("wp_enqueue_scripts", "bootsjsbundle");

function prixgenjs(){
	wp_enqueue_script( 'prixgenjs',plugin_dir_url( __FILE__ ).'js/prixgen.js','',VER );
}
add_action("wp_enqueue_scripts", "prixgenjs");

function bootscss(){
	wp_enqueue_style( 'bootscss',plugin_dir_url( __FILE__ ).'css/bootstrap.min.css.css','',VER );
}
add_action("wp_enqueue_scripts", "bootscss");

function tie_style(){
	wp_enqueue_style( 'tie_style',plugin_dir_url( __FILE__ ).'css/tie_style.css','',VER );
}
add_action("wp_enqueue_scripts", "tie_style");

function appli(){    
?>
    <input type="text" name="mon_url" id="mon_url" me_url="<?php echo plugin_dir_url( __FILE__ ).'load_data.php'?>">
    <div class="container">
        <div class="demo-headline">
            <h4>
                Carte PVC laminée BRILLANTE (standard) ou MATE (option à partir de 100 cartes)
            </h4>
            <p><br></p>
        </div> <!-- /demo-headline -->

        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <h3>Récapitulatif </h3>
                </div>
                <div class="row alert alert-light">
                  <table class="table table-border table-responsive">
                    <tbody>
                        <tr>
                            <td>Quantité</td><td><div id="recap_qte"></div></td>
                        </tr>
                        <tr>
                            <td>Finition</td><td><div id="type_fini"></div></td>
                        </tr> 
                        <tr>
                            <td>Impression</td><td><span id="type_imp"></span> | <span id="prix_imp" prix="0"></span></td>
                        </tr> 
                        <tr>
                            <td>Nombre de modèle Quadri</td><td><div id="type_quadri"></div></td>
                        </tr> 
                        <tr>
                            <td>Zone écriture 1 face</td><td><span id="type_zone"></span> | <span id="prix_zone" prix="0"></span></td>
                        </tr> 
                        <tr>
                            <td>Overlay 1 face</td><td><span id="type_over"></span> | <span id="prix_over" prix="0"></span></td>
                        </tr> 
                        <tr>
                            <td>Numérotation</td><td><span id="type_num"></span> | <span id="numdebu"></span></td>
                        </tr> 
                        <tr>
                            <td>Code barre</td><td><span id="type_barre"></span> | <span id="prix_code" prix="0"></span></td>
                        </tr> 
                        <tr>
                            <td>Qr code</td><td><span id="type_qr"></span> | <span id="prix_qr" prix="0"></span></td>
                        </tr> 
                        <tr>
                            <td>Personnalisation</td><td><span id="type_nom"></span> | <span id="prix_nom" prix="0"></span></td>
                        </tr> 
                        <tr>
                            <td>Infographie</td><td><span id="type_info"></span> | <span id="prix_info" prix="0"></span></td>
                        </tr> 
                        <tr>
                          <td></td>
                          <td></td>
                        </tr> 
                        <tr>
                          <td>
                              <button type="button" class="alert alert-light" id="SouTot">Calculer Sous Total</button>
                          </td>
                          <td><span id="amount"></span> <span>(Hors FDP)</span></td>
                        </tr> 
                      </tbody>
                  </table>
                </div>
            </div>
            <div class="col-md-7">
                <form>
                    <div class="form-group row">
                        <h5>Quantité: </h5>
                        <select class="form-control" id="quantite" name="quantite">
                            <option value="">Sélectionner une quantité</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option><option value="1000">1000</option><option value="1100">1100</option><option value="1200">1200</option><option value="1300">1300</option><option value="1400">1400</option><option value="1500">1500</option><option value="1600">1600</option><option value="1700">1700</option><option value="1800">1800</option><option value="1900">1900</option><option value="2000">2000</option><option value="2100">2100</option><option value="2200">2200</option><option value="2300">2300</option><option value="2400">2400</option><option value="2500">2500</option><option value="2600">2600</option><option value="2700">2700</option><option value="2800">2800</option><option value="2900">2900</option><option value="3000">3000</option>
                        </select>
                      </div>
                    
                    <div class="alert alert-danger row" role="alert">
                      <h5>Choisir mes options</h5>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4"><h5>Finition </h5></div>
                                <div class="col-6">
                                    <div class="form-check form-radio form-check form-check-inline">
                                      <input type="radio" name="finition" class="form-check-input" id="brillante" value="brillante">
                                      <label class="form-check-label" for="brillante">Brillante</label>
                                    </div>
                                    <div class="form-check form-radio form-check form-check-inline">
                                      <input type="radio" name="finition" class="form-check-input" id="mate" value="mate">
                                      <label class="form-check-label" for="mate" >Mate</label>
                                    </div>
                                </div>
                                <div class="col-2 justify-content-end">
                                    Aide
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4"><h5>Impression </h5></div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="imp_recto" name="impression" class="form-check-input" value="recto">
                                      <label class="form-check-label" for="imp_recto">Recto</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="imp_rectoverso" name="impression" class="form-check-input" value="rectoverso">
                                      <label class="form-check-label" for="imp_verso">Recto verso</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    Aide
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4" id="quadrititle"><h5>Nombre de modèles quadri </h5></div>
                                <div class="col-md-6">
                                    <select class="form-control" id="nbquadri" name="nbquadri">
                                        <div id="nb_quadri"></div>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    Aide
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4"><h5>Zone d'écriture </h5></div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="ecri_oui" name="zone_ecri" class="form-check-input" value="oui">
                                      <label class="form-check-label" for="ecri_oui">Oui</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="ecri_non" name="zone_ecri" class="form-check-input" value="non">
                                      <label class="form-check-label" for="ecri_non">Non</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    Aide
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="ecri_row_oui">
                                <div class="col-md-4">Si oui</div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="ecri_recto" name="ecri_face" class="form-check-input" value="recto">
                                      <label class="form-check-label" for="ecri_recto">Recto</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="ecri_verso" name="ecri_face" class="form-check-input" value="verso">
                                      <label class="form-check-label" for="ecri_verso">Verso</label>
                                    </div>
                                    <div class="form-check">
                                        <select class="form-control" id="ecri_nb" name="ecri_nb">
                                            <option value="">- Nombre de zone -</option>
                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4"><h5>Overlay 1 face </h5></div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="over_oui" name="overlay" class="form-check-input" value="oui">
                                      <label class="form-check-label" for="over_oui">Oui</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="over_non" name="overlay" class="form-check-input" value="non">
                                      <label class="form-check-label" for="over_non">Non</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    Aide
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="over_row_oui">
                                <div class="col-md-4">Si oui</div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="over_recto" name="over_face" class="form-check-input" value="recto">
                                      <label class="form-check-label" for="over_recto">Recto</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="over_verso" name="over_face" class="form-check-input" value="verso">
                                      <label class="form-check-label" for="over_verso">Verso</label>
                                    </div>
                                    <div class="form-check">
                                        <select class="form-control" id="over_col" name="over_col">
                                            <option value="">- Collage overlay -</option>
                                            <option value="droite">Collage petit côté droite</option>
                                            <option value="gauche">Collage petit côté gauhe</option>
                                            <option value="haut">Collage grand côté haut</option>
                                            <option value="bas">Collage grand côté bas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4"><h5>Personnalisation noire </h5></div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="perso_oui" name="personal" class="form-check-input" value="oui">
                                      <label class="form-check-label" for="perso_oui">Oui</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="perso_non" name="personal" class="form-check-input" value="non">
                                      <label class="form-check-label" for="perso_non">Non</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    Aide
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="perso_num_row">
                                <div class="col-md-4">Numérotation</div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" id="perso_num" name="perso_num">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="container" id="perso_num_oui">
                                <div class="row alert alert-light">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="num_recto" name="num_face" class="form-check-input" value="recto">
                                          <label class="form-check-label" for="num_recto">Recto</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="num_verso" name="num_face" class="form-check-input" value="verso">
                                          <label class="form-check-label" for="num_verso">Verso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row alert alert-light">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="num_incre" name="num_alea" class="form-check-input" value="increm">
                                          <label class="form-check-label" for="num_incre">N° incremmenté</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="num_alea" name="num_alea" class="form-check-input" value="aleat">
                                          <label class="form-check-label" for="num_alea">Aléatoire</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="num_debut" name="num_debu" placeholder="Saisir N° début" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" id="num_file" name="num_file">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="perso_barre_row">
                                <div class="col-md-4">Code-barre</div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" id="perso_barre" name="perso_barre">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="container" id="perso_barre_oui">
                                <div class="row alert alert-light">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="barre_recto" name="barre_face" class="form-check-input" value="recto">
                                          <label class="form-check-label" for="barre_recto">Recto</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="barre_verso" name="barre_face" class="form-check-input" value="verso">
                                          <label class="form-check-label" for="barre_verso">Verso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row alert alert-light">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="code39" name="barre_code" class="form-check-input" value="code39">
                                          <label class="form-check-label" for="code39">Code 39</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="ean13" name="barre_code" class="form-check-input" value="ean13">
                                          <label class="form-check-label" for="ean13">EAN 13</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="2_5" name="barre_code" class="form-check-input" value="code2_5">
                                          <label class="form-check-label" for="2_5">2/5</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="code_autre" name="barre_code" class="form-check-input" value="code_autre">
                                          <label class="form-check-label" for="code_autre">Autre, précisez</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" id="barre_file" name="barre_file">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="perso_qr_row">
                                <div class="col-md-4">Qr code</div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" id="perso_qr" name="perso_qr">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="container" id="perso_qr_oui">
                                <div class="row alert alert-light">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="qr_recto" name="qr_face" class="form-check-input" value="recto">
                                          <label class="form-check-label" for="qr_recto">Recto</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="qr_verso" name="qr_face" class="form-check-input" value="verso">
                                          <label class="form-check-label" for="qr_verso">Verso</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" id="qr_file" name="qr_file">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="perso_nom_row">
                                <div class="col-md-4">Personnalisation nominative</div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="1" id="perso_nom" name="perso_nom">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="container" id="perso_nom_oui">
                                <div class="row alert alert-light">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="nom_recto" name="nom_face" class="form-check-input" value="recto">
                                          <label class="form-check-label" for="nom_recto">Recto</label>
                                        </div>
                                        <div class="form-check form-radio form-check-inline">
                                          <input type="radio" id="nom_verso" name="nom_face" class="form-check-input" value="verso">
                                          <label class="form-check-label" for="nom_verso">Verso</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" id="nom_file" name="nom_file">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row form-group border border-light">
                        <div class="container alert alert-light">
                            <div class="row">
                                <div class="col-md-4"><h5>Infographie </h5></div>
                                <div class="col-md-6">
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="info_oui" name="info" class="form-check-input" value="oui">
                                      <label class="form-check-label" for="info_oui">Oui</label>
                                    </div>
                                    <div class="form-check form-radio form-check-inline">
                                      <input type="radio" id="info_non" name="info" class="form-check-input" value="non">
                                      <label class="form-check-label" for="info_non">Non</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    Aide
                                </div>
                            </div>
                            
                            <div class="row alert alert-light" id="info_row_oui">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="info_file" name="info_file">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="info_file1" name="info_file1">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="info_file2" name="info_file2">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row alert alert-light" id="info_row_oui">
                                <div class="col-md-4">Gabarit</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="gab_file" name="info_file">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div> 
        </div>

    </div> <!-- /container -->
<?php
}
add_action('wp_footer','appli');
