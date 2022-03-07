<html>
    <body>
        <div align='center'>
        <form method='GET'>
        


  <label for="vol">Volume (between 0 and 50):</label>
  <input type="range" id="vol" name="txtMessage" min="0" max="50">
  <input type="submit" name="btnSend" value="Submit">


</body>
</html>
                <?php
                $host="127.0.0.1";
                $port=20205;
                
                if(isset($_GET['btnSend'])){
                    $msg=$_REQUEST['txtMessage'];
                    $sock= socket_create(AF_INET, SOCK_STREAM,0);
                    socket_connect($sock,$host,$port);

                    socket_write($sock,$msg,strlen($msg));

                    $reply=socket_read($sock,1924);
                    $reply=trim($reply);
                    $reply="server says:\t".$reply;
                }
                ?>
                <tr>
                    <td>
                        <textarea rows='10' col='30'><?php echo @$reply; ?></textarea>
                    </td>
                </tr>
                

            </table>
            </form>
            </body>
            </div>
            </html>