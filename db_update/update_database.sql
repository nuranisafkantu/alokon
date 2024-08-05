alter table tbl_user
    add nama Varchar(255) not null after password;

alter table tbl_mst_jns_alkon
    add satuan varchar(50) not null;    

alter table tbl_data_alkon
    drop column satuan;

rename table tbl_supplier to tbl_mst_supplier;

INSERT INTO tbl_user (username, password, nama, role)
VALUES ('admin', MD5('admin123'), 'admin', 0),
VALUES ('petugas', MD5('petugas123'), 'petugas', 1),
VALUES ('pimpinan', MD5('pimpinan123'), 'pimpinan', 2);

alter table tbl_data_alkon
    drop column stock_awal;

create table tbl_stock_alkon
(
    id_stock_alkon int auto_increment,
    id_data_alkon  int           not null comment 'linked to tbl_data_alkon',
    stock          int           not null,
    expired_date   datetime      null comment 'tanggal yang akan di jadikan patokan triger',
    entry_date     date          null,
    status         int default 0 not null comment '0 = expired, 1 = active',
    constraint tbl_stock_alkon_pk
        primary key (id_stock_alkon)
)
    comment 'Data stok yang akan di jadikan';

create table tbl_out_alkon
(
    id_out_alkon   int auto_increment,
    id_stock_alkon int          not null comment 'ambil barang dari stok',
    taking         int          null,
    id_faskes      int          not null comment 'relasi dari tbl_mst_faskes',
    nama_penerima  varchar(255) not null,
    out_date       date         null,
    constraint tbl_out_alkon_pk
        primary key (id_out_alkon)
)
    comment 'data barang keluar';

alter table tbl_stock_alkon
    add is_first int default 0 not null comment '0 = bukan stok awal, 1 = stok awal' after entry_date;

SET GLOBAL event_scheduler = ON;

DELIMITER $$

CREATE EVENT check_expired_stock
ON SCHEDULE EVERY 5 MINUTE
DO
BEGIN
    UPDATE tbl_stock_alkon
    SET status = 0
    WHERE expired_date < NOW();
END$$

DELIMITER ;

alter table tbl_stock_alkon
    add no_batch varchar(255) null after id_data_alkon;

alter table tbl_stock_alkon
    add id_supplier int not null after id_data_alkon;

alter table tbl_stock_alkon
    modify id_supplier int null;

alter table tbl_stock_alkon
    modify expired_date datetime not null comment 'tanggal yang akan di jadikan patokan triger';

alter table tbl_stock_alkon
    modify entry_date date not null;

alter table tbl_stock_alkon
    modify status int default 0 not null comment '0 = expired, 1 = active, 2 = habis';
