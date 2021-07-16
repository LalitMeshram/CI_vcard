<?php

class UserMasterModel extends CI_Model {

    public function insert_user($data) {
        $userData = $data['userData'];
        $serviceData = $data['serviceData'];
        $bussData = $data['bussData'];
        $result = array();

        $this->db->trans_begin();
        $this->db->insert('user_master', $data);
        $result['userid'] = $this->db->insert_id();
        $this->setServiceData($result['userid'], $serviceData);
        $this->setBussData($result['userid'], $bussData);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();

            $result['status'] = true;
            return $result;
        }
    }

    public function get_user($id) {
        $data;
        if ($id != 0) {
            $data = $query = $this->db->get_where('user_master', array('id' => $id))->row_array();
        } else {
            $data = $this->db->get('user_master')->result();
        }
        return $data;
    }

    public function update_user($data) {
        $userData = $data['userData'];
        $serviceData = $data['serviceData'];
        $bussData = $data['bussData'];
        $this->db->trans_begin();
        $this->db->where('id', $userData['id']);
        $this->db->update('user_master', $userData);
        
       $this->setServiceData($userData['id'], $serviceData);
        $this->setBussData($userData['id'], $bussData);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();

            return TRUE;
        }


    }

    public function delete_user($id) {
        return $this->db->delete('user_master', array('id' => $id));
    }

    public function setServiceData($userid, $serviceData) {
        foreach ($serviceData as $service) {
            $image_path = '';
            if (isset($service->otherImage)) {
                $image_path = $this->upload_file($service->otherImage);
            }
            $serviceArr = array(
                "user_id" => $userid,
                "service_type_id" => $service->service_type_id,
                "value" => $service->value,
                "image" => $image_path,
                "sequence" => $service->sequence,
            );
            $this->db->insert('service_type_mapping', $serviceArr);
            $serviceid = $this->db->insert_id();
        }
    }

    function upload_file($encoded_string) {
        $target_dir = '/resource/img/pay/'; // add the specific path to save the file
        $filedata = explode(',', $encoded_string);
        $decoded_file = base64_decode($filedata[1]);
        //$decoded_file = base64_decode($encoded_string); // decode the file
        $mime_type = finfo_buffer(finfo_open(), $decoded_file, FILEINFO_MIME_TYPE); // extract mime type
        $extension = $this->mime2ext($mime_type); // extract extension from mime type
        $file = uniqid() . '.' . $extension; // rename file as a unique name
        $file_dir = $target_dir . uniqid() . '.' . $extension;
        try {
            file_put_contents($file_dir, $decoded_file); // save
            return $file_dir;
            // database_saving($file);
            // header('Content-Type: application/json');
            // echo json_encode("File Uploaded Successfully");
        } catch (Exception $e) {
            echo $e->getMessage();
            // header('Content-Type: application/json');
            // echo json_encode($e->getMessage());
        }
    }

    function mime2ext($mime) {
        $all_mimes = '{"png":["image\/png","image\/x-png"],"bmp":["image\/bmp","image\/x-bmp",
        "image\/x-bitmap","image\/x-xbitmap","image\/x-win-bitmap","image\/x-windows-bmp",
        "image\/ms-bmp","image\/x-ms-bmp","application\/bmp","application\/x-bmp",
        "application\/x-win-bitmap"],"gif":["image\/gif"],"jpeg":["image\/jpeg",
        "image\/pjpeg"],"xspf":["application\/xspf+xml"],"vlc":["application\/videolan"],
        "wmv":["video\/x-ms-wmv","video\/x-ms-asf"],"au":["audio\/x-au"],
        "ac3":["audio\/ac3"],"flac":["audio\/x-flac"],"ogg":["audio\/ogg",
        "video\/ogg","application\/ogg"],"kmz":["application\/vnd.google-earth.kmz"],
        "kml":["application\/vnd.google-earth.kml+xml"],"rtx":["text\/richtext"],
        "rtf":["text\/rtf"],"jar":["application\/java-archive","application\/x-java-application",
        "application\/x-jar"],"zip":["application\/x-zip","application\/zip",
        "application\/x-zip-compressed","application\/s-compressed","multipart\/x-zip"],
        "7zip":["application\/x-compressed"],"xml":["application\/xml","text\/xml"],
        "svg":["image\/svg+xml"],"3g2":["video\/3gpp2"],"3gp":["video\/3gp","video\/3gpp"],
        "mp4":["video\/mp4"],"m4a":["audio\/x-m4a"],"f4v":["video\/x-f4v"],"flv":["video\/x-flv"],
        "webm":["video\/webm"],"aac":["audio\/x-acc"],"m4u":["application\/vnd.mpegurl"],
        "pdf":["application\/pdf","application\/octet-stream"],
        "pptx":["application\/vnd.openxmlformats-officedocument.presentationml.presentation"],
        "ppt":["application\/powerpoint","application\/vnd.ms-powerpoint","application\/vnd.ms-office",
        "application\/msword"],"docx":["application\/vnd.openxmlformats-officedocument.wordprocessingml.document"],
        "xlsx":["application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application\/vnd.ms-excel"],
        "xl":["application\/excel"],"xls":["application\/msexcel","application\/x-msexcel","application\/x-ms-excel",
        "application\/x-excel","application\/x-dos_ms_excel","application\/xls","application\/x-xls"],
        "xsl":["text\/xsl"],"mpeg":["video\/mpeg"],"mov":["video\/quicktime"],"avi":["video\/x-msvideo",
        "video\/msvideo","video\/avi","application\/x-troff-msvideo"],"movie":["video\/x-sgi-movie"],
        "log":["text\/x-log"],"txt":["text\/plain"],"css":["text\/css"],"html":["text\/html"],
        "wav":["audio\/x-wav","audio\/wave","audio\/wav"],"xhtml":["application\/xhtml+xml"],
        "tar":["application\/x-tar"],"tgz":["application\/x-gzip-compressed"],"psd":["application\/x-photoshop",
        "image\/vnd.adobe.photoshop"],"exe":["application\/x-msdownload"],"js":["application\/x-javascript"],
        "mp3":["audio\/mpeg","audio\/mpg","audio\/mpeg3","audio\/mp3"],"rar":["application\/x-rar","application\/rar",
        "application\/x-rar-compressed"],"gzip":["application\/x-gzip"],"hqx":["application\/mac-binhex40",
        "application\/mac-binhex","application\/x-binhex40","application\/x-mac-binhex40"],
        "cpt":["application\/mac-compactpro"],"bin":["application\/macbinary","application\/mac-binary",
        "application\/x-binary","application\/x-macbinary"],"oda":["application\/oda"],
        "ai":["application\/postscript"],"smil":["application\/smil"],"mif":["application\/vnd.mif"],
        "wbxml":["application\/wbxml"],"wmlc":["application\/wmlc"],"dcr":["application\/x-director"],
        "dvi":["application\/x-dvi"],"gtar":["application\/x-gtar"],"php":["application\/x-httpd-php",
        "application\/php","application\/x-php","text\/php","text\/x-php","application\/x-httpd-php-source"],
        "swf":["application\/x-shockwave-flash"],"sit":["application\/x-stuffit"],"z":["application\/x-compress"],
        "mid":["audio\/midi"],"aif":["audio\/x-aiff","audio\/aiff"],"ram":["audio\/x-pn-realaudio"],
        "rpm":["audio\/x-pn-realaudio-plugin"],"ra":["audio\/x-realaudio"],"rv":["video\/vnd.rn-realvideo"],
        "jp2":["image\/jp2","video\/mj2","image\/jpx","image\/jpm"],"tiff":["image\/tiff"],
        "eml":["message\/rfc822"],"pem":["application\/x-x509-user-cert","application\/x-pem-file"],
        "p10":["application\/x-pkcs10","application\/pkcs10"],"p12":["application\/x-pkcs12"],
        "p7a":["application\/x-pkcs7-signature"],"p7c":["application\/pkcs7-mime","application\/x-pkcs7-mime"],"p7r":["application\/x-pkcs7-certreqresp"],"p7s":["application\/pkcs7-signature"],"crt":["application\/x-x509-ca-cert","application\/pkix-cert"],"crl":["application\/pkix-crl","application\/pkcs-crl"],"pgp":["application\/pgp"],"gpg":["application\/gpg-keys"],"rsa":["application\/x-pkcs7"],"ics":["text\/calendar"],"zsh":["text\/x-scriptzsh"],"cdr":["application\/cdr","application\/coreldraw","application\/x-cdr","application\/x-coreldraw","image\/cdr","image\/x-cdr","zz-application\/zz-winassoc-cdr"],"wma":["audio\/x-ms-wma"],"vcf":["text\/x-vcard"],"srt":["text\/srt"],"vtt":["text\/vtt"],"ico":["image\/x-icon","image\/x-ico","image\/vnd.microsoft.icon"],"csv":["text\/x-comma-separated-values","text\/comma-separated-values","application\/vnd.msexcel"],"json":["application\/json","text\/json"]}';
        $all_mimes = json_decode($all_mimes, true);
        foreach ($all_mimes as $key => $value) {
            if (array_search($mime, $value) !== false)
                return $key;
        }
        return false;
    }

    public function setBussData($userid, $bussData) {
        foreach ($bussData as $business) {
            $bussArr = array(
                "user_id" => $userid,
                "type" => $business->type,
                "content" => $business->content
            );
            $this->db->insert('business_content', $bussArr);
            $bussid = $this->db->insert_id();
        }
    }

    

}
