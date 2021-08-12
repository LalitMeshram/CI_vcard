<?php

class UserMasterModel extends CI_Model {

    public function insert_user($data) {
        $userData = $data['userData'];
        $serviceData = $data['serviceData'];
        $bussData = $data['bussData'];
        $result = array();

        $this->db->trans_begin();
        $this->db->insert('user_master', $userData);
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
        $result = [];

        $this->db->select(
                'um.id,'
                . 'um.business_name,'
                . 'um.role_id,'
                . 'um.profile_id,'
                . 'rm.role,'
                . 'um.first_name,'
                . 'um.middle_name,'
                . 'um.last_name,'
                . 'um.phone1,'
                . 'um.phone2,'
                . 'um.profile_image,'
                . 'um.address,'
                . 'um.about_us,'
                . 'um.total_amount,'
                . 'um.paid_amount,'
                . 'um.discount,'
                . 'um.installation_date,'
                . 'um.next_renewal_date,'
                . 'um.renewal_amount,'
                . 'um.term,'
                . 'um.is_active,'
                . 'um.remark,'
                . 'um.discount_id,'
                . 'um.designation,'
                . 'um.whatsapp_number,'
                . 'um.map_direction_url,'
                . 'um.website_url,'
                . 'um.email_id,'
                . 'um.created_at,'
                . 'cum.first_name as creator_fname,'
                . 'cum.middle_name as creator_mname,'
                . 'cum.last_name as creator_lname,'
                . 'agent.first_name as agent_fname,'
                . 'agent.middle_name as agent_mname,'
                . 'agent.last_name as agent_lname'
        );

        $this->db->join('role_master rm', 'um.role_id = rm.id');
        $this->db->join('user_master cum', 'cum.id = um.created_by');
        $this->db->join('user_master agent', 'agent.id = um.agent_id');
        if ($id != 0) {
            $result['data'] = $query = $this->db->get_where('user_master um', array('um.id' => $id))->result_array();
        } else {
            $result['data'] = $this->db->get('user_master um')->result_array();
        }
        $result['status'] = TRUE;
        return $result;
    }

    public function update_user($data, $id) {
        $userData = $data['userData'];
        $serviceData = $data['serviceData'];
        $bussData = $data['bussData'];
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('user_master', $userData);

        $this->setServiceData($id, $serviceData);
        $this->setBussData($id, $bussData);
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
        $serviceArr;
        $i = 0;
//        print_r($serviceData);exit;
        $result = $this->getServiceDetails($userid);
        if ($result['status'] == true) {
            foreach ($result['data'] as $arr) {
                if ($arr->flag == 1) {
                    unlink($arr->image);
                }
            }
        }
        foreach ($serviceData as $service) {
            $image_path = '';
            if (isset($service->otherImage) && $service->flag == 1) {
                $image_path = $this->upload_file($service->otherImage);
            }
            $serviceArr[$i++] = array(
                "user_id" => $userid,
                "service_type_id" => $service->service_type_id,
                "value" => $service->value,
                "image" => $image_path,
                "flag" => $service->flag
            );
        }


        if ($result['status'] == true) {
            $this->deleteServiceDetails($userid);
        }

        $this->db->insert_batch('service_type_mapping', $serviceArr);
    }

    function upload_file($encoded_string) {
        $target_dir = 'resource/img/pay/'; // add the specific path to save the file
        $filedata = explode(',', $encoded_string);
        $decoded_file = base64_decode($filedata[1]);
        //$decoded_file = base64_decode($encoded_string); // decode the file
        $mime_type = finfo_buffer(finfo_open(), $decoded_file, FILEINFO_MIME_TYPE); // extract mime type
        $extension = $this->mime2ext($mime_type); // extract extension from mime type
        $file = uniqid() . '.' . $extension; // rename file as a unique name
        $file_dir = $target_dir . uniqid() . '.' . $extension;
//        $file = 'lalit1' . '.' . $extension; // rename file as a unique name
//        $file_dir = $target_dir . 'lalit1' . '.' . $extension;
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
        $bussArr;
        $i = 0;
        foreach ($bussData as $business) {
            $bussArr[$i++] = array(
                "user_id" => $userid,
                "type" => $business->type,
                "content" => $business->content,
                "sequence" => $business->sequence,
            );
        }
//         $this->db->insert('business_content', $bussArr);
//            $bussid = $this->db->insert_id();
        $result = $this->getBusinessDetails($userid);
        if ($result['status'] == true) {
            $this->deleteBusinessDetails($userid);
        }

        $this->db->insert_batch('business_content', $bussArr);
    }

    public function getServiceDetails($userid) {
        $result = [];
        $this->db->select('stmap.id,'
                . 'stmap.user_id,'
                . 'stmap.service_type_id,'
                . 'stm.title,'
                . 'stmap.value,'
                . 'stmap.image,'
                . 'stmap.flag');
        $this->db->join('service_type_master stm', 'stm.id = stmap.service_type_id');
        $data = $query = $this->db->get_where('service_type_mapping stmap', array('stmap.user_id' => $userid))->result();

        if (!empty($data)) {
            $result['status'] = true;
            $result['data'] = $data;
        } else {
            $result['data'] = [];
            $result['status'] = false;
        }

        return $result;
    }

    public function getBusinessDetails($userid) {
        $sql = "SELECT * FROM `business_content` WHERE user_id= $userid";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result['status'] = true;
            $result['data'] = $query->result();
        } else {
            $result['status'] = false;
        }
        return $result;
    }

    public function getDataAsperUserId($userId) {
        $this->db->where("phone1='" . $userId . "' OR email_id='" . $userId . "'");
        $result = $this->db->get('user_master')->row_array();
        return $result;
    }

    public function deleteServiceDetails($userid) {
        return $this->db->delete('service_type_mapping', array('user_id' => $userid));
    }

    public function deleteBusinessDetails($userid) {
        return $this->db->delete('business_content', array('user_id' => $userid));
    }

}
