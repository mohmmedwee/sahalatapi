USE [master]
GO
/****** Object:  Database [SahalatDB]    Script Date: 5/14/2017 11:52:51 PM ******/
CREATE DATABASE [SahalatDB]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'SahalatDB', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\SahalatDB.mdf' , SIZE = 3072KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'SahalatDB_log', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\SahalatDB_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [SahalatDB] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [SahalatDB].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [SahalatDB] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [SahalatDB] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [SahalatDB] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [SahalatDB] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [SahalatDB] SET ARITHABORT OFF 
GO
ALTER DATABASE [SahalatDB] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [SahalatDB] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [SahalatDB] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [SahalatDB] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [SahalatDB] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [SahalatDB] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [SahalatDB] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [SahalatDB] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [SahalatDB] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [SahalatDB] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [SahalatDB] SET  DISABLE_BROKER 
GO
ALTER DATABASE [SahalatDB] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [SahalatDB] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [SahalatDB] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [SahalatDB] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [SahalatDB] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [SahalatDB] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [SahalatDB] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [SahalatDB] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [SahalatDB] SET  MULTI_USER 
GO
ALTER DATABASE [SahalatDB] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [SahalatDB] SET DB_CHAINING OFF 
GO
ALTER DATABASE [SahalatDB] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [SahalatDB] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [SahalatDB]
GO
/****** Object:  Table [dbo].[MW_Cuisines]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_Cuisines](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[CuisineStatus] [bit] NULL,
	[CreatedBy] [int] NULL,
	[CreatedDate] [date] NULL,
	[UpdatedBy] [int] NULL,
	[UpdatedDate] [date] NULL,
 CONSTRAINT [PK_MW_Cuisines] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_Cuisines_Localization]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_Cuisines_Localization](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[CuisineID] [int] NULL,
	[CuisineName] [nvarchar](50) NULL,
	[CuisineDescription] [ntext] NULL,
	[LanguageID] [int] NULL,
 CONSTRAINT [PK_MW_Cuisines_Localization] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_HomePageBanner]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_HomePageBanner](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[BannerTitle] [nvarchar](50) NULL,
	[BannerImage] [nvarchar](max) NULL,
	[SortOrder] [int] NULL,
	[CreatedBy] [int] NULL,
	[CreatedDate] [date] NULL,
	[UpdatedBy] [int] NULL,
	[UpdatedDate] [date] NULL,
 CONSTRAINT [PK_MW_HomePageBanner] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_PaymentMethods]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_PaymentMethods](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[PaymentMethodName] [nvarchar](50) NULL,
 CONSTRAINT [PK_MW_PaymentMethods] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_Restaurants]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_Restaurants](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[RestaurantStatus] [int] NULL,
	[URL] [nvarchar](250) NULL,
	[RestaurantThumpnail] [nvarchar](max) NULL,
	[PostDateOrder] [int] NULL,
	[CommissionType] [int] NULL,
	[MinimumOrderAmount] [decimal](18, 3) NULL,
	[DiscountType] [int] NULL,
	[Discount] [decimal](18, 2) NULL,
	[PushNotifications] [bit] NULL,
	[CreatedBy] [int] NULL,
	[CreatedDate] [date] NULL,
	[UpdatedBy] [int] NULL,
	[UpdatedDate] [date] NULL,
 CONSTRAINT [PK_MW_Restaurants] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_Restaurants_Localization]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_Restaurants_Localization](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[RestaurantID] [int] NULL,
	[RestaurantName] [nvarchar](100) NULL,
	[Description] [ntext] NULL,
	[Summary] [ntext] NULL,
	[LanguageID] [int] NULL,
 CONSTRAINT [PK_MW_Restaurants_Localization] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_RestaurantsPaymentMethods]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_RestaurantsPaymentMethods](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[PaymentMethodID] [int] NULL,
	[RestaurantID] [int] NULL,
	[CommissionAmount] [decimal](18, 3) NULL,
	[CreatedBy] [int] NULL,
	[CreatedDate] [date] NULL,
	[UpdatedBy] [int] NULL,
	[UpdatedDate] [date] NULL,
 CONSTRAINT [PK_MW_RestaurantsPaymentMethods] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_UsersTypes]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_UsersTypes](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[UserType] [nvarchar](50) NULL,
	[UserTypeID] [int] NULL,
 CONSTRAINT [PK_MW_UsersTypes] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[MW_WebsiteSettings]    Script Date: 5/14/2017 11:52:51 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MW_WebsiteSettings](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Logo] [nchar](10) NULL,
	[UpdatedBy] [int] NULL,
	[UpdatedDate] [date] NULL,
 CONSTRAINT [PK_MW_WebsiteSettings] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
USE [master]
GO
ALTER DATABASE [SahalatDB] SET  READ_WRITE 
GO
