<?php $c_name = '\''.$_GET["q"].'\''; //echo '<script type="text/javascript">del_bookmarks('.$c_name.');</script>';?>
<div class="repository-content">
    <div id="bookmark" class="btn-group" style="float:right">
      <button class="btn btn-sm BtnGroup-item" style="margin-right:10px;z-index:0" data-disable-with="Creating file…" onclick="div_show_3();">
        Add bookmark
      </button>
      <button name="del_bookmark" style="margin-right:10px" class="btn btn-sm BtnGroup-item" data-disable-with="Creating file…" onclick="del_bookmarks(<?= $c_name ?>, <?= false?>)">
        Delete Bookmark
      </button>
      <button style="z-index:0" name="share_bookmark" class="btn btn-sm BtnGroup-item" data-disable-with="Creating file…" onclick="div_show_4(); del_bookmarks(<?= $c_name ?>, <?= true?>)">
        Share bookmark
      </button>
    </div>

<table class="table table-striped files js-navigation-container js-active-navigation-container" data-pjax="">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Link</th>
            <th>Description</th>
            <th>Date/Time added</th>
        </tr>
    </thead>
    <tbody id = "bookmarks">
        <?php if($positions[0]["date/time"] != ""): ?>
        <?php foreach ($positions as $position): ?>
            <tr style = "height:42px" class="js-navigation-item text-left" name="<?= $position["S.No"] ?>" onmouseover = "checkbox_display('a-<?= $position["S.No"]; ?>')" onmouseout = "checkbox_hide('a-<?= $position["S.No"]; ?>', 'a1-<?= $position["S.No"]; ?>')">
                <td style = "width:80px"><?=$position["S.No"]?></td>
                <td style="width:400px"><a href="<?=$position["bookmark_link"];?>" target="_blank"><?=$position["bookmark_link"]?></a></td>
                <td style="width:250px"><?=$position["description"]?></td>
                <td><?= date('m/d/y',strtotime($position["date/time"]))?>, <?=date('g:i a',strtotime($position["date/time"])); ?></td>
                              <td class="Edit">
                    <a href="#" onclick="div_show_3_1('<?= $position["bookmark_link"]; ?>','<?=$position["description"]?>', <?= $c_name?>)">Edit</a>
                </td>
                <?php //if($position["date/time"] != ""): ?>
                <td style="width:40px">
                    <div id = "a-<?= $position["S.No"]; ?>" class = "checkbox" style = "display:none">
                        <label>
                            <input id = "a1-<?= $position["S.No"]; ?>" type="checkbox" value="">
                        </label>
                    </div>
                </td>
                <?php //endif; ?>
            </tr>

                <!---->
        <?php endforeach ?>
        <?php endif; ?>
        <?php //$c_name = '\''.$_GET["q"].'\''; echo '<script type="text/javascript">del_bookmarks('.$c_name.');</script>';?>
    </tbody>
</table>
</div>