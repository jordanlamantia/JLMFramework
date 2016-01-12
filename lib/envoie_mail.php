<?php

class Mail
{

    /**
     *Classe Mail
     * @author Jordan La Mantia
     * @copyright Jordan La Mantia
     */

    private $mail_expediteur;
    private $nom_expediteur;
    private $mail_replyto;
    private $mail_destinataires;
    private $bcc;
    private $objet;
    private $texte;
    private $html;
    private $fichiers;
    private $frontiere;
    private $headers;
    private $message;

    public function __construct($mail_expediteur, $nom_expediteur, $mail_destinataires)
    {

        /**
         *Constructeur de la classe Mail
         * @param string Adresse Mail expediteur
         * @param string Adresse Mail destinataire
         * @param string Adresse Mail de retour
         * @return void Pas de retour mais génère une exception si les mails passé ne sont pas au format attendu.
         * @author Jordan La Mantia
         */

        //Test des paramètres
        if (!self::validateEmail($mail_expediteur)) {
            throw new InvalidArgumentException("Mail expediteur invalide");
        }

        if (!self::validateEmail($mail_destinataires)) {
            throw new InvalidArgumentException("Mail replyto invalide");
        }

        //initialiser les propriétés
        $this->nom_expediteur = $nom_expediteur;
        $this->mail_expediteur = $mail_expediteur;
        $this->mail_replyto = $mail_expediteur;
        $this->mail_destinataires = $mail_destinataires;
        $this->bcc = '';
        $this->objet = '';
        $this->texte = '';
        $this->html = '';
        $this->fichiers = '';
        $this->frontiere = md5(uniqid(mt_rand())); //Générer la frontière entre texte, html, pièces jointes.
        $this->headers = '';
        $this->message = '';

    }

    public function ajouterDestinataire($mail)
    {

        /**
         *Ajouter un destinataire
         * @param $mail
         * @return True ou False
         * @author Jordan La Mantia
         */

        if (!self::validateEmail($mail)) {
            throw new InvalidArgumentException("Mail destinataire invalide");
        }

        if ($this->mail_destinataires == '') {
            $this->mail_destinataires = $mail;
        } else {
            $this->mail_destinataires .= ';' . $mail;
        }
    }

    public function ajouterBcc($mail)
    {

        /**
         *Ajouter une copie
         * @param $mail
         * @return True ou False
         * @author Jordan La Mantia
         */


        if (!self::validateEmail($mail)) {
            throw new InvalidArgumentException("Bcc invalide");
        }

        if ($this->bcc == '') {
            $this->bcc = $mail;
        } else {
            $this->bcc .= ';' . $mail;
        }
    }

    public function ajouterPj($fichiers)
    {

        /**
         *Ajouter une pièce jointe
         * @param le nom de la ou les pièces jointes
         * @return True ou False
         * @author Jordan La Mantia
         */

        if (!file_exists($fichiers)) {
            throw new InvalidArgumentException("Pièce jointe inexistante");
        }

        if ($this->fichiers == '') {
            $this->fichiers = $fichiers;
        } else {
            $this->fichiers .= ';' . $fichiers;
        }
    }

    public function contenu($objet, $texte, $html)
    {
        //Prévoir des tests
        $this->objet = $objet;
        $this->texte = $texte;
        $this->html = $html;
    }

    private function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    public function envoyer()
    {

        // ********************* HEADER DU MAIL ********************* -->

        $this->headers = 'From: ' . $this->nom_expediteur . '<' . $this->mail_expediteur . '>' . "\n";
        $this->headers .= 'Return-Path: <' . $this->mail_replyto . '>' . "\n";
        $this->headers .= 'MIME-Version: 1.0' . "\n";
        if ($this->bcc != '') {
            $this->headers .= "Bcc: " . $this->bcc . "\n";
        }
        $this->headers .= 'Content-Type: multipart/mixed; boundary="' . $this->frontiere . '"';

        //<!-- ********************* MESSAGE TEXTE DU MAIL ********************* -->
        //$message = '';

        if ($this->texte != '') {
            $this->message = 'This is a multi part message in MIME format.' . "\n\n";

            $this->message .= '--' . $this->frontiere . "\n";
            $this->message .= 'Content-Type: text/plain; charset="utf-8"' . "\n";
            $this->message .= 'Content-Transfert-Encoding: 8bit' . "\n\n";
            $this->message .= $this->texte . "\n\n";
        }

        //<!-- ********************* Message HTML DU MAIL ********************* -->

        if ($this->html != '') {
            $this->message .= '--' . $this->frontiere . "\n";

            $this->message .= 'Content-Type: text/html; charset="utf-8"' . "\n";
            $this->message .= 'Content-Transfert-Encoding: 8bit' . "\n\n";
            $this->message .= $this->html . "\n\n";
        }

        //<!-- ********************* PIECE JOINTE DU MAIL ********************* -->


        if ($this->fichiers != '') {
            $tab_fichiers = explode(';', $this->fichiers);
            $nb_fichiers = count($tab_fichiers);

            for ($i = 0; $i < count($tab_fichiers); $i++) {
                $this->message .= '--' . $this->frontiere . "\n";
                $this->message .= 'Content-Type: image/jpeg; name="' . $tab_fichiers[$i] . '"' . "\n";
                $this->message .= 'Content-Transfer-Encoding: base64' . "\n";
                $this->message .= 'Content-Disposition:attachement; filename="' . $tab_fichiers[$i] . '"' . "\n\n";
                $this->message .= chunk_split(base64_encode(file_get_contents($tab_fichiers[$i]))) . "\n\n";
            }
        }

        //Envoie du mail
        if (!mail($this->mail_destinataires, $this->objet, $this->message, $this->headers)) {
            throw new Exception('Envoie du mail échoué');
        }
    }
}
