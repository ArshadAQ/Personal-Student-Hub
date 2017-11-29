<div class="repository-content">
    <!--<div id="bookmark" class="btn-group" style="float:right">
      <button class="btn btn-sm BtnGroup-item" style="margin-right:10px" data-disable-with="Creating file…">
        Add bookmark
      </button>
      <button class="btn btn-sm BtnGroup-item" data-disable-with="Creating file…">
        Delete Bookmark
      </button>
    </div>-->
    <div id="course" class="btn-group" style="float:right">
      <button class="btn btn-sm BtnGroup-item" data-disable-with="Creating file…" style="margin-right:10px;z-index:0" onclick="div_show_2();">
        Add course/topic
      </button>
      <button name = "del_course" class="btn btn-sm BtnGroup-item" style="margin-right:10px" data-disable-with="Creating file…">
        Delete course/topic
      </button>
    </div>

<table class="table table-striped files js-navigation-container js-active-navigation-container" data-pjax="">
    <thead>
        <tr>
            <th></th>
            <th>Courses</th>
            <th>Date/Time</th>
        </tr>
    </thead>
    <tbody id="courses">
        <?php if($positions[0]["date/time"] != ""): ?>
        <?php $count=0; foreach ($positions as $position): ?>
          <?php
                $course = $position["Course_Name"];
                //$name_id = preg_replace('/\s+/', '', $name);
                //$name_list = array();
                $course_list[$count++] = $course;
          ?>
            <tr class="js-navigation-item text-left" style="height:42px" name="<?= $position["Course_Name"] ?>" onmouseover = "checkbox_display('a-<?= $position["Course_Name"]; ?>')" onmouseout = "checkbox_hide('a-<?= $position["Course_Name"]; ?>', 'a1-<?= $position["Course_Name"]; ?>')">
                <td class="icon">
                    <svg aria-hidden="true" class="octicon octicon-file-directory" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path fill-rule="evenodd" d="M13 4H7V3c0-.66-.31-1-1-1H1c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1V5c0-.55-.45-1-1-1zM6 4H1V3h5v1z"></path></svg>
                <!--<img alt="" class="spinner" height="16" src="https://assets-cdn.github.com/images/spinners/octocat-spinner-32.gif" width="16">-->
                </td>
                <td class="content" style="width: 336px;">
                    <span class="css-truncate css-truncate-target"><a id = "<?= $position["Course_Name"] ?>" onclick="post_course('<?= $position["Course_Name"]; ?>')"class="js-navigation-open" id="01777e4a9846fea5f3fcc8fe40d44680-04cc62f69ad4c8ac307a1f8aa4874d74f39c970f"><?= $position["Course_Name"] ?></a></span>
                </td>
                <td><?= date('m/d/y',strtotime($position["date/time"]));?>, <?=date('g:i a',strtotime($position["date/time"])); ?></td>
                <td class="Edit" style="width:60px">
                    <a href="#" onclick="div_show_2_1('<?= $position["Course_Name"]; ?>')">Edit</a>
                </td>
                <td class="check-box" style="width:40px">
                    <div id = "a-<?= $position["Course_Name"]; ?>" class = "checkbox" style = "display:none">
                        <label>
                            <input id = "a1-<?= $position["Course_Name"]; ?>" type="checkbox" value="">
                        </label>
                    </div>
                </td>
            </tr>

                <!---->
        <?php endforeach ?>
        <?php endif; ?>
    </tbody>
</table>
<?php  if($positions[0]["date/time"] != "") echo '<script type="text/javascript">del_courses(' . json_encode($course_list) . ');</script>';?>
</div>
<style>
    tr{
        height:38px;
    }
</style>