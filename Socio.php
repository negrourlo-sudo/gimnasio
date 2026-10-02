<?php
class Socio {
    public string $nombre;
    public string $email;
    public string $tipoCuota;

    public function __construct(string $nombre, string $email, string $tipoCuota) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->tipoCuota = $tipoCuota;
    }

    public function resumen() : string {
        return $this->nombre . " - cuota " . ucfirst($this->tipoCuota);
    }

    public function esPremium() : bool {
        return $this->tipoCuota === 'premium';
    }
}
