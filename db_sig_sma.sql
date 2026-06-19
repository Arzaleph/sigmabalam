--
-- PostgreSQL database dump
--

\restrict rFHDt2jjcQx7fpvad9tnY9xLT391JbaVBDgTezZU6zHysWVJUmOePyctpcaACjD

-- Dumped from database version 18.4
-- Dumped by pg_dump version 18.4

-- Started on 2026-06-10 18:26:43

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2 (class 3079 OID 19107)
-- Name: postgis; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- TOC entry 5888 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry and geography spatial types and functions';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 226 (class 1259 OID 20196)
-- Name: tabel_sekolah; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tabel_sekolah (
    id integer NOT NULL,
    geom public.geometry(Point,4326),
    full_id character varying,
    osm_id character varying,
    osm_type character varying,
    amenity character varying,
    website character varying,
    "operator:type" character varying,
    operator character varying,
    "addr:neighbourhood" character varying,
    "addr:district" character varying,
    grades character varying,
    religion character varying,
    "addr:subdistrict" character varying,
    "addr:province" character varying,
    "addr:postcode" character varying,
    "addr:housename" character varying,
    "addr:city" character varying,
    "addr:street" character varying,
    "addr:housenumber" character varying,
    name character varying,
    education character varying
);


ALTER TABLE public.tabel_sekolah OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 20195)
-- Name: tabel_sekolah_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tabel_sekolah_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tabel_sekolah_id_seq OWNER TO postgres;

--
-- TOC entry 5889 (class 0 OID 0)
-- Dependencies: 225
-- Name: tabel_sekolah_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tabel_sekolah_id_seq OWNED BY public.tabel_sekolah.id;


--
-- TOC entry 5722 (class 2604 OID 20199)
-- Name: tabel_sekolah id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tabel_sekolah ALTER COLUMN id SET DEFAULT nextval('public.tabel_sekolah_id_seq'::regclass);


--
-- TOC entry 5721 (class 0 OID 19426)
-- Dependencies: 221
-- Data for Name: spatial_ref_sys; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 5882 (class 0 OID 20196)
-- Dependencies: 226
-- Data for Name: tabel_sekolah; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tabel_sekolah VALUES (1, '0101000020E6100000BF0E9C33A24C5A4099BB96900FBA15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT Nurul Falah', 'school');
INSERT INTO public.tabel_sekolah VALUES (2, '0101000020E6100000CA54C1A8A44E5A405AF5B9DA8ABD15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA JANNATUN NAIM INTERNATIONAL COLLEGE', 'school');
INSERT INTO public.tabel_sekolah VALUES (3, '0101000020E6100000DCD7817346505A40CB10C7BAB8CD15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS BODHISATTVA', 'school');
INSERT INTO public.tabel_sekolah VALUES (4, '0101000020E61000002A3A92CB7F505A40EB73B515FBCB15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 8 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (5, '0101000020E610000029ED0DBE30515A4027C286A757CA15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS ISLAMIYAH', 'school');
INSERT INTO public.tabel_sekolah VALUES (6, '0101000020E61000001B9E5E29CB545A4098DD938785DA15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 17 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (7, '0101000020E610000034A2B437F8525A405305A3923AC115C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 6 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (8, '0101000020E61000005BB1BFEC9E545A4093A9825149DD15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS YPPL PANJANG', 'school');
INSERT INTO public.tabel_sekolah VALUES (9, '0101000020E610000093A9825149515A40B1BFEC9E3CAC15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS BPK PENABUR', 'school');
INSERT INTO public.tabel_sekolah VALUES (10, '0101000020E6100000C5FEB27BF2505A4063EE5A423EA815C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS NUSANTARA BANDARLAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (11, '0101000020E6100000B6F3FDD478515A40B537F8C264AA15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS UTAMA 1', 'school');
INSERT INTO public.tabel_sekolah VALUES (12, '0101000020E6100000F0164850FC505A40355EBA490CC215C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA STELLA GRACIA', 'school');
INSERT INTO public.tabel_sekolah VALUES (13, '0101000020E61000006891ED7C3F515A40E78C28ED0DBE15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 4 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (14, '0101000020E6100000865AD3BCE3505A400F9C33A2B4B715C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS IMMANUEL BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (15, '0101000020E6100000E5F21FD26F4F5A40EF38454772B915C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS MUHAMMADIYAH 1', 'school');
INSERT INTO public.tabel_sekolah VALUES (16, '0101000020E610000069006F8104515A40D734EF3845C715C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS TAMAN SISWA TELUK BETUNG UTARA', 'school');
INSERT INTO public.tabel_sekolah VALUES (17, '0101000020E610000007F0164850505A40F7E461A1D6B415C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 2 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (18, '0101000020E61000006B9A779CA24F5A4076711B0DE0AD15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 3 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (19, '0101000020E610000067D5E76A2B4E5A4083C0CAA145B615C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS ADIGUNA', 'school');
INSERT INTO public.tabel_sekolah VALUES (20, '0101000020E610000083893F8A3A505A40ACFD9DEDD1AB15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS Islam Nazhirah', 'school');
INSERT INTO public.tabel_sekolah VALUES (21, '0101000020E6100000910F7A36AB4E5A40075F984C158C15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS PELITA BANGSA', 'school');
INSERT INTO public.tabel_sekolah VALUES (22, '0101000020E6100000CE88D2DEE04F5A40EC51B81E85AB15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS PERINTIS 1 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (23, '0101000020E610000042CF66D5E74E5A402EFF21FDF6B515C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS PERINTIS 2 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (24, '0101000020E6100000910F7A36AB4E5A40787AA52C439C15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 16 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (25, '0101000020E610000080B74082E24F5A4039454772F98F15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 9 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (26, '0101000020E610000048E17A14AE4F5A40ACADD85F768F15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS DCC GLOBAL SCHOOL', 'school');
INSERT INTO public.tabel_sekolah VALUES (27, '0101000020E61000006D567DAEB64E5A40B30C71AC8B9B15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS Islam Cendikia', 'school');
INSERT INTO public.tabel_sekolah VALUES (28, '0101000020E6100000E5886B6B7A505A40D6BB896BC69315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA PENYIMBANG', 'school');
INSERT INTO public.tabel_sekolah VALUES (29, '0101000020E61000006A4DF38E53505A40F8C264AA609415C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS BINA MULYA KEDATON', 'school');
INSERT INTO public.tabel_sekolah VALUES (30, '0101000020E6100000228E75711B515A40D3BCE3141D8915C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS SURYA DHARMA 2 KEDATON', 'school');
INSERT INTO public.tabel_sekolah VALUES (31, '0101000020E61000005C8FC2F528545A40166A4DF38E9315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAIT PERMATA BUNDA', 'school');
INSERT INTO public.tabel_sekolah VALUES (32, '0101000020E61000004F1E166A4D535A406688635DDC8615C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 12 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (33, '0101000020E6100000F54A598638525A40143FC6DCB58415C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 5 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (34, '0101000020E6100000AE47E17A144E5A4044696FF0858915C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT BAITUL JANNAH', 'school');
INSERT INTO public.tabel_sekolah VALUES (35, '0101000020E6100000DAACFA5C6D4D5A405F984C158C8A15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT Daarul Ilmi', 'school');
INSERT INTO public.tabel_sekolah VALUES (36, '0101000020E61000001B9E5E29CB4C5A40304CA60A46A515C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT FITRAH INSANI', 'school');
INSERT INTO public.tabel_sekolah VALUES (37, '0101000020E61000004BC8073D9B4D5A40BEC11726538515C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 14 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (38, '0101000020E6100000D42B6519E24C5A402041F163CC9D15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 7 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (39, '0101000020E610000021B07268914D5A403CBD5296218E15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS AL HUSNA', 'school');
INSERT INTO public.tabel_sekolah VALUES (40, '0101000020E610000013F241CF664D5A40FFB27BF2B09015C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS BUDAYA', 'school');
INSERT INTO public.tabel_sekolah VALUES (41, '0101000020E610000036AB3E575B4D5A40CA54C1A8A48E15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS PERSADA BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (42, '0101000020E61000002AA913D0444C5A4075029A081B9E15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS YAMAMA', 'school');
INSERT INTO public.tabel_sekolah VALUES (43, '0101000020E61000000A33C8B8BD4E5A406C257497C48115C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA ISLAM GLOBAL SURYA', 'school');
INSERT INTO public.tabel_sekolah VALUES (44, '0101000020E6100000F5F23B4D664F5A400A80F10C1A6A15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT MIFTAHUL JANNAH', 'school');
INSERT INTO public.tabel_sekolah VALUES (45, '0101000020E6100000C1A8A44E404F5A40736891ED7C7F15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA QURAN DARUL FATTAH', 'school');
INSERT INTO public.tabel_sekolah VALUES (46, '0101000020E6100000AC8BDB68004F5A40F7E461A1D67415C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S AL KAUTSAR', 'school');
INSERT INTO public.tabel_sekolah VALUES (47, '0101000020E6100000C7BAB88D06505A40508D976E128315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S DARMA BANGSA', 'school');
INSERT INTO public.tabel_sekolah VALUES (48, '0101000020E61000005C2041F163505A40A52C431CEB6215C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 13 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (49, '0101000020E610000051DA1B7C614E5A400B24287E8C7915C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS GLOBAL MADANI', 'school');
INSERT INTO public.tabel_sekolah VALUES (50, '0101000020E610000027C286A757525A4003098A1F636E15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT ABDURRAHMAN IBNU AUF', 'school');
INSERT INTO public.tabel_sekolah VALUES (51, '0101000020E61000002F6EA301BC515A40211FF46C567D15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S GAJAH MADA', 'school');
INSERT INTO public.tabel_sekolah VALUES (52, '0101000020E61000004CA60A4625515A40C5FEB27BF27015C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 15 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (53, '0101000020E6100000CDCCCCCCCC505A40B003E78C286D15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS PANGUDI LUHUR', 'school');
INSERT INTO public.tabel_sekolah VALUES (54, '0101000020E6100000CDB051D66F505A40B6813B50A76C15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS YADIKA', 'school');
INSERT INTO public.tabel_sekolah VALUES (55, '0101000020E610000079E9263108505A403C4ED1915C7E15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S FRANSISCUS', 'school');
INSERT INTO public.tabel_sekolah VALUES (56, '0101000020E61000000EBE30992A505A40FBCBEEC9C38215C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S MUHAMMADIYAH 2', 'school');
INSERT INTO public.tabel_sekolah VALUES (57, '0101000020E61000005A643BDF4F515A40DAACFA5C6D8515C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS AL - AZHAR', 'school');
INSERT INTO public.tabel_sekolah VALUES (58, '0101000020E6100000EFC9C342AD515A40492EFF21FDB615C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 10 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (59, '0101000020E610000020D26F5F07525A40273108AC1C9A15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S TUNAS MEKAR INDONESIA', 'school');
INSERT INTO public.tabel_sekolah VALUES (60, '0101000020E6100000BC2363B5F9505A409ECE15A584B015C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 1 BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (61, '0101000020E6100000DC4603780B505A40CEAACFD556AC15C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S ARJUNA', 'school');
INSERT INTO public.tabel_sekolah VALUES (62, '0101000020E6100000CD3B4ED191505A4000917EFB3AB015C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S UTAMA 2', 'school');
INSERT INTO public.tabel_sekolah VALUES (63, '0101000020E6100000C58F31772D515A403333333333B315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S XAVERIUS BANDAR LAMPUNG', 'school');
INSERT INTO public.tabel_sekolah VALUES (64, '0101000020E61000000E4FAF9465505A407E1D386744A915C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S YP UNILA', 'school');
INSERT INTO public.tabel_sekolah VALUES (65, '0101000020E6100000E3C798BB96505A40386744696FB015C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS UTAMA 3', 'school');
INSERT INTO public.tabel_sekolah VALUES (66, '0101000020E61000001D91EF52EA4E5A4067800BB2658915C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA IT Quran Qordhova', 'school');
INSERT INTO public.tabel_sekolah VALUES (67, '0101000020E610000013F241CF664D5A404ED1915CFE8315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAS IT AR RAIHAN', 'school');
INSERT INTO public.tabel_sekolah VALUES (68, '0101000020E6100000BC0512143F525A40C4B12E6EA3C115C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA S NURUL ISLAM', 'school');
INSERT INTO public.tabel_sekolah VALUES (69, '0101000020E6100000DBF97E6ABC505A403255302AA9D315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMA ASSAFINA', 'school');
INSERT INTO public.tabel_sekolah VALUES (70, '0101000020E6100000C898BB96904F5A40C05B2041F1E315C0', NULL, NULL, 'node', 'school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandar Lampung', NULL, NULL, 'SMAN 11 BANDAR LAMPUNG', 'school');


--
-- TOC entry 5890 (class 0 OID 0)
-- Dependencies: 225
-- Name: tabel_sekolah_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tabel_sekolah_id_seq', 70, true);


--
-- TOC entry 5728 (class 2606 OID 20202)
-- Name: tabel_sekolah tabel_sekolah_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tabel_sekolah
    ADD CONSTRAINT tabel_sekolah_pkey PRIMARY KEY (id);


--
-- TOC entry 5726 (class 1259 OID 20205)
-- Name: sidx_tabel_sekolah_geom; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sidx_tabel_sekolah_geom ON public.tabel_sekolah USING gist (geom);


-- Completed on 2026-06-10 18:26:43

--
-- PostgreSQL database dump complete
--

\unrestrict rFHDt2jjcQx7fpvad9tnY9xLT391JbaVBDgTezZU6zHysWVJUmOePyctpcaACjD

