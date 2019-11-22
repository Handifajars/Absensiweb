CREATE TABLE absen(    id_absen character varying(15) NOT NULL,    nip character(5),    tgl date,    jam_masuk reltime,    status_masuk character varying(20),    count reltime,    CONSTRAINT absen_pkey PRIMARY KEY (id_absen));CREATE TABLE admin(    username character varying(25) NOT NULL,    password character varying NOT NULL,    CONSTRAINT admin_pkey PRIMARY KEY (username));CREATE TABLE data_gaji(    id_gaji character varying(15)  NOT NULL,    nip character(5)  NOT NULL,    tgl date NOT NULL,    nama_sekolah character varying(30)  NOT NULL,    CONSTRAINT data_gaji_pkey PRIMARY KEY (id_gaji));CREATE TABLE gaji(    golongan character varying(20)  NOT NULL,    nominal numeric(10,0) NOT NULL);CREATE TABLE gaji_pegawai(    nip character(5)  NOT NULL,    nama_sekolah character varying(30)  NOT NULL,    bulan numeric(10,0) NOT NULL,    tahun numeric(10,0) NOT NULL,    banyak_pertemuan integer NOT NULL,    gaji numeric(10,0) NOT NULL);CREATE TABLE jadwal(    id_jadwal character(5)  NOT NULL,    nip character(5) ,    nama_sekolah character varying(30) ,    hari character varying(10) ,    jam reltime,    golongan character varying(2) ,    CONSTRAINT jadwal_pkey PRIMARY KEY (id_jadwal));CREATE TABLE pegawai(    nip character(5)  NOT NULL,    nama character varying(50)  NOT NULL,    jenis_kelamin character varying(1)  NOT NULL,    no_hp character varying(15)  NOT NULL,    status_pegawai character varying(15)  NOT NULL,    password character varying(50)  NOT NULL,    CONSTRAINT pegawai_pkey PRIMARY KEY (nip));