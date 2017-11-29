<form action="quote.php" method="post">
<nav class="navbar navbar-default nav-pills">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand">
            <button id="popup" onclick="div_show()" class="btn btn-custom " type="button">
                <span class="glyphicon glyphicon-user"></span>
                Add contact
            </button>
        </a>
    </div>
    <?php $name_list = array();?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
            <a href="#">
                <button name = "delete" class="btn btn-custom " type="button">
                    <span class="glyphicon glyphicon-user"></span>
                    Delete contacts
                </button>
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <!--<li>
            <a class="navbar-brand">
                <button id="popup1" onclick="Get_Directions($_SESSION["id"])" class="btn btn-custom " type="button">
                    <span class="glyphicon glyphicon-user"></span>
                    Modify contacts
                </button>
            </a>

        </li>-->
      </ul>
      <!--<ul class="nav navbar-nav navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
        </button>
        </div>
        </ul>  -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</form>

<div class="row">
    <div class="col-md-3">
        <div style="float:left; width:20%;">
            <div id="main" role="main">

                <div class="element custom">

                        <div class="element-header">
                            <!--<select id="select-beast" class="demo-default selectized" placeholder="Select a person..." tabindex="-1" style="display: none;"></select>-->

                          <input id="search1" type="text" name="s" value="" placeholder="Search">
                           <!--<select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select></select></input>-->
                          <h2 id="header"><?=$name?> contacts</h2>
                        </div>

                    <div class="element-content" id = "forcheckbox">
                        <ul class="list">
                            <!-- Creating ids fors all names -->
                            <?php foreach ($positions as $position): ?>
                                <?php
                                    $name = $position["name"];
                                    $name_id = preg_replace('/\s+/', '', $name);
                                    //$name_list = array();
                                    $name_list[$name_id] = $name;
                                ?>


                                    <li id = "index-<?= $name_id; ?>" name="<?= $name_id; ?>" data-group="work">
                                        <div id = "index_new-<?= $name_id; ?>" class = "checkbox" style = "float:left; margin-left:10px; display:none" onmouseover = "checkbox_display('index_new-<?= $name_id; ?>')">
                                            <label>
                                                <input id = "index_new_1-<?= $name_id; ?>" type="checkbox" value="">
                                            </label>
                                        </div>
                                        <a onmouseover = "checkbox_display('index_new-<?= $name_id; ?>')" onmouseout = "checkbox_hide('index_new-<?= $name_id; ?>', 'index_new_1-<?= $name_id; ?>')"  onclick='div_show_1("<?= $name; ?>")'><?=$name?><span><?=$position["emailid"]?></span></a>
                                    </li>
                            <?php endforeach ?>
                            <!--<?=print(json_encode($name_list));?>-->
                            <!--<?php "del_contacts(json_encode($name_list)');" ?>-->
                            <?php $result = json_encode($name_list); ?>
                            <!--<?php echo "del_contacts(<?=$result;?>);";?>-->

                            <?php echo '<script type="text/javascript">del_contacts(' . json_encode($name_list) . ');</script>';?>
                            <!--<?php echo '<script type="text/javascript">del_contacts('.json_encode($name_list).');</script>';?>-->

                            <li>
                                <a href="#" class="add-new">+ Add new contact</a>
                            </li>
                        </ul>


                        <div class="element-sidebar">
                          <!-- Link to every first name -->
                          <?php $count = 0; foreach ($positions as $position): ?>
                                <?php $name = $position["name"]; $count++; $name_id = preg_replace('/\s+/', '', $name);?>
                                <?php if ($count==1): ?>
                                    <?php  $index = substr($name, 0, 1); ?>
                                        <a href="#index-<?= $name_id; ?>">A</a>
                                <?php elseif(substr($name,0,1)!=$index) : ?>
                                    <?php $index = substr($name, 0, 1); ?>
                                            <a href="#index-<?= $name_id; ?>"><?=$index;?></a>
                                <?php endif ?>
                            <?php endforeach ?>

                        </div>

                    </div>

                </div>

            </div>
<!-- Set Div As your requirement -->
        </div>
    </div>
    <div class="col-md-6">
        <!--<div class="container-fluid">-->

            <!-- https://developers.google.com/maps/documentation/javascript/tutorial -->
            <div id="map-canvas"></div>

            <div id="legend"><p class = "head">Legend</p></div>
        <!--</div>-->

        <!--<div id = "map-canvas"></div>
        <div id="legend"><p class = "head">Legend</p></div>-->
 <!-- Set Div As your requirement -->
    </div>
    <div class="col-md-3" id="right-panel"></div>
</div>







