<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="Title">
                    <?php echo JText::_( 'Title' ); ?>:
                </label>
            </td>
            <td>
                <input type="text" name="title" id="title"  value="<?php echo $this->greeting->title;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="author name">
                    <?php echo JText::_( 'Author Name' ); ?>:
                </label>
            </td>
             <td>
                <input type="text" name="name" id="name"  value="<?php echo $this->greeting->name;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="description">
                    <?php echo JText::_( 'Description' ); ?>:
                </label>
            </td>
            <td>
                 <textarea class="text_area" name="description" id="description" rows="5" cols="10"><?php echo $this->greeting->description;?></textarea>
            </td>
        </tr>

    </table>
    </fieldset>
</div>

<div class="clr"></div>

<input type="hidden" name="option" value="com_tests" />
<input type="hidden" name="id" value="<?php echo $this->greeting->id; ?>" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="controller" value="test" />

</form>