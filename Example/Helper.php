<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 08.03.2019
 * Time: 10:47
 */



class Helper
{
    const DANGER = "danger";
    const SUCCESS = "success";
    const WARNING = "warning";


    public static function getPolicyNO()
    {
        return $policyNo = $_GET['policy_no'] ? $_GET['policy_no'] : POLICY_NO;
    }

    public static function getApi()
    {
        return \DividoServiceClient\Service\DividoServiceClientService::createDev(USERNAME, PASSWORD);
    }

    public static function showMessage($type, $message)
    {
        echo '<div class="alert alert-' . $type . '" role="alert">
        	<strong>' . $type . ':</strong> ' . $message . '
        </div>';
    }

    public static function getValue($name, $default = null, $method = "GET")
    {
        return ($method == "GET") ? ($_GET[$name] ?? $default) : ($_POST[$name] ?? $default);
    }

    public static function outputFile(\IDefendApi\DataStorage\File $file)
    {
        header("Content-type:" . $file->mimeType);
        header("Content-Disposition:inline;filename='$file->name");
        echo $file->content;
    }

    /**
     * @param $name
     * @param \IDefendApi\DataStorage\ListItem[] $items
     * @param $value
     * @param string $id
     * @return string
     */
    public static function getSelect($name, array $items, $value, $id = '')
    {
        $result = "<select class=\"form-control\" name=\"$name\" id=\"$id\">
                    ";
        foreach ($items as $listItem) {
            $result .= "<option value=\"$listItem->id\" " . ($value == $listItem->id ? "selected " : "") . ">$listItem->name</option>";
        }
        $result .= "
                </select>";

        return $result;
    }

    public static function getInputBlock($name, $value, $caption, $id = '',$required=false)
    {
        $result = "<div class=\"form-group row\">
                <label for=\"$id\" class=\"col-sm-3 col-form-label\">$caption ".($required?" <span>*</span> ":"")."</label>
                <div class=\"col-sm-3\">
                    <input type=\"deposit\" class=\"form-control\" name=\"$name\" id=\"$id\" placeholder=\"\"
                           value=\"$value\" ".($required?"required":"").">
                </div>
            </div>";

        return $result;
    }

}