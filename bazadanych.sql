--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1 (Debian 15.1-1.pgdg110+1)
-- Dumped by pg_dump version 15.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Community; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Community" (
    id integer NOT NULL,
    name text NOT NULL,
    nickname character varying(30) NOT NULL
);


ALTER TABLE public."Community" OWNER TO dbuser;

--
-- Name: Community_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Community_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Community_id_seq" OWNER TO dbuser;

--
-- Name: Community_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Community_id_seq" OWNED BY public."Community".id;


--
-- Name: FavouriteMeme; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."FavouriteMeme" (
    id integer NOT NULL,
    "ID_User" integer NOT NULL,
    "ID_Meme" integer NOT NULL
);


ALTER TABLE public."FavouriteMeme" OWNER TO dbuser;

--
-- Name: FavouriteMeme_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."FavouriteMeme_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."FavouriteMeme_id_seq" OWNER TO dbuser;

--
-- Name: FavouriteMeme_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."FavouriteMeme_id_seq" OWNED BY public."FavouriteMeme".id;


--
-- Name: LikedCommunity; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."LikedCommunity" (
    id integer NOT NULL,
    "ID_User" integer NOT NULL,
    "ID_Community" integer
);


ALTER TABLE public."LikedCommunity" OWNER TO dbuser;

--
-- Name: LikedCommunity_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."LikedCommunity_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."LikedCommunity_id_seq" OWNER TO dbuser;

--
-- Name: LikedCommunity_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."LikedCommunity_id_seq" OWNED BY public."LikedCommunity".id;


--
-- Name: Meme; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Meme" (
    id integer NOT NULL,
    "ID_User" integer NOT NULL,
    "ID_Community" integer,
    post_date date NOT NULL,
    text text,
    file_name character varying(255) NOT NULL
);


ALTER TABLE public."Meme" OWNER TO dbuser;

--
-- Name: Meme_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."Meme_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Meme_id_seq" OWNER TO dbuser;

--
-- Name: Meme_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."Meme_id_seq" OWNED BY public."Meme".id;


--
-- Name: RateMeme; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."RateMeme" (
    id integer NOT NULL,
    "ID_User" integer NOT NULL,
    "ID_Meme" integer NOT NULL,
    rate_value integer NOT NULL
);


ALTER TABLE public."RateMeme" OWNER TO dbuser;

--
-- Name: RateMeme_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public."RateMeme_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."RateMeme_id_seq" OWNER TO dbuser;

--
-- Name: RateMeme_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public."RateMeme_id_seq" OWNED BY public."RateMeme".id;


--
-- Name: Role; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Role" (
    id integer NOT NULL,
    rola character varying(150)
);


ALTER TABLE public."Role" OWNER TO dbuser;

--
-- Name: User; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."User" (
    id integer NOT NULL,
    login character varying(30) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(100) NOT NULL,
    "ID_Role" integer DEFAULT 0
);


ALTER TABLE public."User" OWNER TO dbuser;

--
-- Name: table_name_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public.table_name_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.table_name_id_seq OWNER TO dbuser;

--
-- Name: table_name_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public.table_name_id_seq OWNED BY public."Role".id;


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO dbuser;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dbuser
--

ALTER SEQUENCE public.users_id_seq OWNED BY public."User".id;


--
-- Name: Community id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Community" ALTER COLUMN id SET DEFAULT nextval('public."Community_id_seq"'::regclass);


--
-- Name: FavouriteMeme id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."FavouriteMeme" ALTER COLUMN id SET DEFAULT nextval('public."FavouriteMeme_id_seq"'::regclass);


--
-- Name: LikedCommunity id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."LikedCommunity" ALTER COLUMN id SET DEFAULT nextval('public."LikedCommunity_id_seq"'::regclass);


--
-- Name: Meme id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Meme" ALTER COLUMN id SET DEFAULT nextval('public."Meme_id_seq"'::regclass);


--
-- Name: RateMeme id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."RateMeme" ALTER COLUMN id SET DEFAULT nextval('public."RateMeme_id_seq"'::regclass);


--
-- Name: Role id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Role" ALTER COLUMN id SET DEFAULT nextval('public.table_name_id_seq'::regclass);


--
-- Name: User id; Type: DEFAULT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User" ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: Community; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."Community" (id, name, nickname) FROM stdin;
1	Polskie memy	polska
2	Szkoła	szkola
3	Sport	sport
0	Home	---
4	Polityka	polityka
5	Studia	studia
6	Stany Zjednoczone	usa
8	teawat	dawdawdaw
9	gggggggggg	aaaaaaaaaaa
10	dwadwa	dwadwadwadawd
11	IT	Informatyka
\.


--
-- Data for Name: FavouriteMeme; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."FavouriteMeme" (id, "ID_User", "ID_Meme") FROM stdin;
\.


--
-- Data for Name: LikedCommunity; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."LikedCommunity" (id, "ID_User", "ID_Community") FROM stdin;
38	36	2
39	36	3
40	36	5
42	38	5
43	38	1
44	37	11
45	37	5
46	37	4
\.


--
-- Data for Name: Meme; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."Meme" (id, "ID_User", "ID_Community", post_date, text, file_name) FROM stdin;
69	36	0	2023-02-05		meme69.jpg
70	36	2	2023-02-05		meme70.jpeg
71	36	3	2023-02-05		meme71.png
72	36	4	2023-02-05		meme72.jpg
73	38	5	2023-02-05	Pierwszoroczni prawnicy	meme73.jpg
74	38	1	2023-02-05	A co tam chowasz?	meme74.png
75	38	0	2023-02-05		meme75.jpg
78	40	0	2023-02-06	ggg	meme78.jpg
79	43	0	2023-02-06	obrazek	meme79.jpg
\.


--
-- Data for Name: RateMeme; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."RateMeme" (id, "ID_User", "ID_Meme", rate_value) FROM stdin;
62	37	75	1
64	40	74	-1
65	40	71	1
66	40	69	1
50	38	69	1
51	38	70	-1
52	38	71	1
53	38	72	-1
54	38	73	1
55	38	74	1
57	36	75	1
58	36	69	1
59	36	71	1
60	36	74	1
61	37	71	1
63	37	74	-1
\.


--
-- Data for Name: Role; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."Role" (id, rola) FROM stdin;
0	User
1	Admin
\.


--
-- Data for Name: User; Type: TABLE DATA; Schema: public; Owner: dbuser
--

COPY public."User" (id, login, password, email, "ID_Role") FROM stdin;
36	User123	$2y$10$QLE45G3xXqRpYa796/BbueTgSh6WW7Mjfzo5yNPPB5iqXHetWEqZ2	sebastian.galan7625@gmail.com	0
38	User321	$2y$10$cU3zYtE4rdK2WLAMpcthE.WEeyH0e.Afq9SwyiO/KCwtl5N/SM4pi	User@wadwadawd.pl	0
39	User432	$2y$10$ZSImTm7IWHwEq7VHDBqj6uDJCvuZl3dFpERZIdiBSD69mSxvQ6o5.	wadawd@dawdaw.pl	0
37	admin	$2y$10$HkGjZ.f7JnreBL65UPJjAO91ZgAybKyA81yG0HZPJavfH96pIZtxu	admin@admin.pl	1
40	User555	$2y$10$MnFn8XWj0eMTnhRuJJbihuh9AScm.nRANkUCtusAEz99ryh6tuej2	ssaw@dawdaw.pl	0
41	User999	$2y$10$VKvPiFCCF3mffWwkh9mMpukea7J47FRLwDUnsRftq0e0FbB00LDYK	awdw@da.pl	0
42	User444	$2y$10$8fAHgV15YNAvxqa4bGBEjuIIZE6hgMOaxdiEowjoAxd0t4DKqsnGu	awdad@daw.pl	0
43	User987	$2y$10$65IFRmtHt7MLjATfR7LsNeR3mrm0e5vm1FS.cbEq6JfYHJFqq0VDy	dadaw@dawd.pl	0
\.


--
-- Name: Community_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Community_id_seq"', 11, true);


--
-- Name: FavouriteMeme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."FavouriteMeme_id_seq"', 13, true);


--
-- Name: LikedCommunity_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."LikedCommunity_id_seq"', 46, true);


--
-- Name: Meme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Meme_id_seq"', 79, true);


--
-- Name: RateMeme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."RateMeme_id_seq"', 66, true);


--
-- Name: table_name_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public.table_name_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public.users_id_seq', 43, true);


--
-- Name: Community Community_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Community"
    ADD CONSTRAINT "Community_pkey" PRIMARY KEY (id);


--
-- Name: FavouriteMeme FavouriteMeme_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."FavouriteMeme"
    ADD CONSTRAINT "FavouriteMeme_pkey" PRIMARY KEY (id);


--
-- Name: LikedCommunity LikedCommunity_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."LikedCommunity"
    ADD CONSTRAINT "LikedCommunity_pkey" PRIMARY KEY (id);


--
-- Name: Meme Meme_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Meme"
    ADD CONSTRAINT "Meme_pkey" PRIMARY KEY (id);


--
-- Name: RateMeme RateMeme_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."RateMeme"
    ADD CONSTRAINT "RateMeme_pkey" PRIMARY KEY (id);


--
-- Name: Role table_name_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Role"
    ADD CONSTRAINT table_name_pkey PRIMARY KEY (id);


--
-- Name: User users_email_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User"
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: User users_id_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User"
    ADD CONSTRAINT users_id_key UNIQUE (id);


--
-- Name: User users_login_key; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User"
    ADD CONSTRAINT users_login_key UNIQUE (login);


--
-- Name: User users_pk; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User"
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: FavouriteMeme favouritememe_meme_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."FavouriteMeme"
    ADD CONSTRAINT favouritememe_meme_id_fk FOREIGN KEY ("ID_Meme") REFERENCES public."Meme"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: FavouriteMeme favouritememe_user_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."FavouriteMeme"
    ADD CONSTRAINT favouritememe_user_id_fk FOREIGN KEY ("ID_User") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: LikedCommunity likedcommunity_community_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."LikedCommunity"
    ADD CONSTRAINT likedcommunity_community_id_fk FOREIGN KEY ("ID_Community") REFERENCES public."Community"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: LikedCommunity likedcommunity_user_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."LikedCommunity"
    ADD CONSTRAINT likedcommunity_user_id_fk FOREIGN KEY ("ID_User") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Meme meme_community_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Meme"
    ADD CONSTRAINT meme_community_id_fk FOREIGN KEY ("ID_Community") REFERENCES public."Community"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Meme meme_user_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Meme"
    ADD CONSTRAINT meme_user_id_fk FOREIGN KEY ("ID_User") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: RateMeme ratememe_meme_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."RateMeme"
    ADD CONSTRAINT ratememe_meme_id_fk FOREIGN KEY ("ID_Meme") REFERENCES public."Meme"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: RateMeme ratememe_user_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."RateMeme"
    ADD CONSTRAINT ratememe_user_id_fk FOREIGN KEY ("ID_User") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: User user_role_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User"
    ADD CONSTRAINT user_role_id_fk FOREIGN KEY ("ID_Role") REFERENCES public."Role"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

