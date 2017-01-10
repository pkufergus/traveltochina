using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.IO;

namespace AIE_TJ
{
    public partial class MainForm : Form
    {
        string PATH = "\\output\\";
        string PATH2 = "\\template\\";
        public MainForm()
        {
            InitializeComponent();
        }
        public string getOptionFrom(string CityCode,bool isTw,bool isSelect)
        {
            aie.BLL.aie_cityname_from bllCityNameFrom = new aie.BLL.aie_cityname_from();
            StringBuilder option = new StringBuilder();
            List<aie.Model.aie_cityname_from> datalist = bllCityNameFrom.GetModelList("");
            if (!isSelect)
            {
                option.AppendLine("<option value=\"\"></option>");
            }
            foreach (aie.Model.aie_cityname_from cityname in datalist)
            {
                if (cityname.CityCode == CityCode && isSelect== true)
                {
                    if (isTw == true)
                    {
                        option.AppendLine(string.Format("<option selected=\"selected\" value=\"{0}\">{1}</option>", cityname.CityCode, cityname.TraditionalChineseName ));
                    }
                    else
                    {
                        option.AppendLine(string.Format("<option selected=\"selected\" value=\"{0}\">{1}</option>", cityname.CityCode, cityname.ChineseName));
                    }
                    
                }
                else
                {
                    if (isTw == true)
                    {
                        option.AppendLine(string.Format("<option value=\"{0}\">{1}</option>", cityname.CityCode, cityname.TraditionalChineseName));
                    }
                    else
                    {
                        option.AppendLine(string.Format("<option value=\"{0}\">{1}</option>", cityname.CityCode, cityname.ChineseName));
                    } 
                }
            }
            return option.ToString();
        }
        public string getOptionTo(string CityCode, bool isTw, bool isSelect)
        {
            aie.BLL.aie_cityname_cn bllCityNameFrom = new aie.BLL.aie_cityname_cn();
            StringBuilder option = new StringBuilder();
            List<aie.Model.aie_cityname_cn> datalist = bllCityNameFrom.GetModelList("");
            if (!isSelect)
            {
                option.AppendLine("<option value=\"\"></option>");
            }
            foreach (aie.Model.aie_cityname_cn cityname in datalist)
            {
                if (cityname.CityCode == CityCode && isSelect == true)
                {
                    if (isTw == true)
                    {
                        option.AppendLine(string.Format("<option selected=\"selected\" value=\"{0}\">{1}</option>", cityname.CityCode, cityname.TraditionalChineseName));
                    }
                    else
                    {
                        option.AppendLine(string.Format("<option selected=\"selected\" value=\"{0}\">{1}</option>", cityname.CityCode, cityname.ChineseName));
                    }

                }
                else
                {
                    if (isTw == true)
                    {
                        option.AppendLine(string.Format("<option value=\"{0}\">{1}</option>", cityname.CityCode, cityname.TraditionalChineseName));
                    }
                    else
                    {
                        option.AppendLine(string.Format("<option value=\"{0}\">{1}</option>", cityname.CityCode, cityname.ChineseName));
                    }
                }
            }
            return option.ToString();
        }
        private void btnGenerate_Click(object sender, EventArgs e)
        {
            string OUT_DIR = System.Windows.Forms.Application.StartupPath + "\\" + PATH;
            string OUT_CANADA_DIR = System.Windows.Forms.Application.StartupPath + "\\" + PATH +@"canada\\";
            string TEMPLATE = System.Windows.Forms.Application.StartupPath + "\\" + PATH2;

            if (Directory.Exists(OUT_DIR))
            {
                DirectoryInfo di = new DirectoryInfo(OUT_DIR);
                di.Delete(true);
            }
            
            if (!Directory.Exists(OUT_DIR))
            {
                Directory.CreateDirectory(OUT_DIR);
            }
            if (!Directory.Exists(OUT_CANADA_DIR))
            {
                Directory.CreateDirectory(OUT_CANADA_DIR);
            }
            aie.BLL.aie_citypair_n bllPair = new aie.BLL.aie_citypair_n();
            aie.BLL.aie_cityname_from bllCityNameFrom = new aie.BLL.aie_cityname_from();
            aie.BLL.aie_cityname_cn bllCityNameCn = new aie.BLL.aie_cityname_cn();

            StringBuilder menu_usa_cn = new StringBuilder();
            StringBuilder menu_usa_tw = new StringBuilder();
            StringBuilder menu_ca_cn = new StringBuilder();
            StringBuilder menu_ca_tw = new StringBuilder();

            menu_ca_cn.AppendLine("menu_ca_cn-------------------------------------------------------------------------------------------------------------");
            menu_ca_tw.AppendLine("menu_ca_tw-------------------------------------------------------------------------------------------------------------");
            menu_usa_cn.AppendLine("menu_usa_cn-------------------------------------------------------------------------------------------------------------");
            menu_usa_tw.AppendLine("menu_usa_tw-------------------------------------------------------------------------------------------------------------");

            List<aie.Model.aie_citypair_n> datalist = bllPair.GetModelList(" Enable = 1 ");

            foreach (aie.Model.aie_citypair_n aie_citypair in datalist)
            {
                aie.Model.aie_cityname_from aie_citynamefrom = bllCityNameFrom.GetModel(aie_citypair.DepartureCode);
                aie.Model.aie_cityname_cn aie_citynamecn = bllCityNameCn.GetModel(aie_citypair.DestinationCode);
                string indexpath_cn = OUT_DIR + string.Format("cheap-flights-from-{0}-to-{1}\\", aie_citynamefrom.EnglishName.Replace(" ", "-").ToLower(), aie_citynamecn.EnglishName.Replace(" ", "-").ToLower());
                string indexpath_tw = OUT_DIR + string.Format("cheap-flights-from-{0}-to-{1}-tw\\", aie_citynamefrom.EnglishName.Replace(" ", "-").ToLower(), aie_citynamecn.EnglishName.Replace(" ", "-").ToLower());

                if (aie_citypair.Type == "CA")
                {
                    menu_ca_cn.AppendLine(string.Format("<li><a href=\"../cheap-flights-from-{0}-to-{1}/\" target=\"_parent\" style=\"font-size:12px;\"> <b style=\"color:#b0071f;\">{2}至{3}特价机票</b></a> </li>", aie_citynamefrom.EnglishName.Replace(" ", "-").ToLower(), aie_citynamecn.EnglishName.Replace(" ", "-").ToLower(), aie_citynamefrom.ChineseName, aie_citynamecn.ChineseName));
                    menu_ca_tw.AppendLine(string.Format("<li><a href=\"../cheap-flights-from-{0}-to-{1}-tw/\" target=\"_parent\" style=\"font-size:12px;\"> <b style=\"color:#b0071f;\">{2}至{3}特價機票</b></a> </li>", aie_citynamefrom.EnglishName.Replace(" ", "-").ToLower(), aie_citynamecn.EnglishName.Replace(" ", "-").ToLower(), aie_citynamefrom.TraditionalChineseName, aie_citynamecn.TraditionalChineseName));

                }
                else
                {
                    menu_usa_cn.AppendLine(string.Format("<li><a href=\"./cheap-flights-from-{0}-to-{1}/\" target=\"_parent\" style=\"font-size:12px;\"> <b style=\"color:#b0071f;\">{2}至{3}特价机票</b></a> </li>", aie_citynamefrom.EnglishName.Replace(" ", "-").ToLower(), aie_citynamecn.EnglishName.Replace(" ", "-").ToLower(), aie_citynamefrom.ChineseName, aie_citynamecn.ChineseName));
                    menu_usa_tw.AppendLine(string.Format("<li><a href=\"./cheap-flights-from-{0}-to-{1}-tw/\" target=\"_parent\" style=\"font-size:12px;\"> <b style=\"color:#b0071f;\">{2}至{3}特價機票</b></a> </li>", aie_citynamefrom.EnglishName.Replace(" ", "-").ToLower(), aie_citynamecn.EnglishName.Replace(" ", "-").ToLower(), aie_citynamefrom.TraditionalChineseName, aie_citynamecn.TraditionalChineseName));

                }
                
                //创建目录
                if (!Directory.Exists(indexpath_cn))
                {
                    Directory.CreateDirectory(indexpath_cn);
                }
                if (!Directory.Exists(indexpath_tw))
                {
                    Directory.CreateDirectory(indexpath_tw);
                }
                //index
                string index_cn = File.ReadAllText(TEMPLATE + @"index_cn.html", Encoding.UTF8);
                string index_tw = File.ReadAllText(TEMPLATE + @"index_tw.html", Encoding.UTF8);
                index_cn = index_cn.Replace("{###FROM_CITY_NAME###}", aie_citynamefrom.ChineseName);
                index_cn = index_cn.Replace("{###TO_CITY_NAME###}", aie_citynamecn.ChineseName);
                index_tw = index_tw.Replace("{###FROM_CITY_NAME###}", aie_citynamefrom.TraditionalChineseName);
                index_tw = index_tw.Replace("{###TO_CITY_NAME###}", aie_citynamecn.TraditionalChineseName);
                string url_cn = "";
                string url_tw = "";
                if (aie_citypair.Type == "CA")
                {
                    url_cn = string.Format ("../canada/{0}_{1}_price.php",aie_citynamefrom.CityCode.ToLower(),aie_citynamecn.CityCode.ToLower ());
                    url_tw = string.Format("../canada/{0}_{1}_price_cnt.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                }
                else
                {
                    url_cn = string.Format("../{0}_{1}_price.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                    url_tw = string.Format("../{0}_{1}_price_cnt.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                }
                index_cn = index_cn.Replace("{###TO_URL###}", url_cn);
                index_tw = index_tw.Replace("{###TO_URL###}", url_tw);
                File.WriteAllText(indexpath_cn + "index.html", index_cn, Encoding.UTF8);
                File.WriteAllText(indexpath_tw + "index.html", index_tw, Encoding.UTF8);
                //from_to_price
                string from_to_price_cn = "";
                string from_to_price_tw = "";

                if (bllPair.Exists(aie_citynamefrom.CityCode, aie_citynamecn.CityCode))
                {
                    from_to_price_cn = File.ReadAllText(TEMPLATE + @"from_to_price.php", Encoding.UTF8);
                    from_to_price_tw = File.ReadAllText(TEMPLATE + @"from_to_price_cnt.php", Encoding.UTF8);
                }
                else
                {
                    from_to_price_cn = File.ReadAllText(TEMPLATE + @"from_to_price_notj.php", Encoding.UTF8);
                    from_to_price_tw = File.ReadAllText(TEMPLATE + @"from_to_price_cnt_notj.php", Encoding.UTF8);
                }
                from_to_price_cn = from_to_price_cn.Replace("{###FROM_CITY_NAME###}", aie_citynamefrom.ChineseName);
                from_to_price_cn = from_to_price_cn.Replace("{###TO_CITY_NAME###}", aie_citynamecn.ChineseName);
                from_to_price_cn = from_to_price_cn.Replace("{###FROM_CITY_CODE###}", aie_citynamefrom.CityCode);
                from_to_price_cn = from_to_price_cn.Replace("{###TO_CITY_CODE###}", aie_citynamecn.CityCode);
                from_to_price_cn = from_to_price_cn.Replace("{###FROM_CITY_CODE_l###}", aie_citynamefrom.CityCode.ToLower());
                from_to_price_cn = from_to_price_cn.Replace("{###TO_CITY_CODE_l###}", aie_citynamecn.CityCode.ToLower());
                from_to_price_cn = from_to_price_cn.Replace("{###CONTENT###}", aie_citypair.ContentCN);

                from_to_price_tw = from_to_price_tw.Replace("{###FROM_CITY_NAME###}", aie_citynamefrom.TraditionalChineseName);
                from_to_price_tw = from_to_price_tw.Replace("{###TO_CITY_NAME###}", aie_citynamecn.TraditionalChineseName);
                from_to_price_tw = from_to_price_tw.Replace("{###FROM_CITY_CODE###}", aie_citynamefrom.CityCode);
                from_to_price_tw = from_to_price_tw.Replace("{###TO_CITY_CODE###}", aie_citynamecn.CityCode);
                from_to_price_tw = from_to_price_tw.Replace("{###FROM_CITY_CODE_l###}", aie_citynamefrom.CityCode.ToLower());
                from_to_price_tw = from_to_price_tw.Replace("{###TO_CITY_CODE_l###}", aie_citynamecn.CityCode.ToLower());
                from_to_price_tw = from_to_price_tw.Replace("{###CONTENT###}", aie_citypair.ContentTW);

                string filename_cn = string.Format("{0}_{1}_price.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                string filename_tw = string.Format("{0}_{1}_price_cnt.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                if (aie_citypair.Type == "CA")
                {
                    File.WriteAllText(OUT_CANADA_DIR + filename_cn, from_to_price_cn, Encoding.UTF8);
                    File.WriteAllText(OUT_CANADA_DIR + filename_tw, from_to_price_tw, Encoding.UTF8);
                }
                else
                {
                    File.WriteAllText(OUT_DIR + filename_cn, from_to_price_cn, Encoding.UTF8);
                    File.WriteAllText(OUT_DIR + filename_tw, from_to_price_tw, Encoding.UTF8);
                }

                //chinese_from_usa_cnt_from_to
                string chinese_from_usa_from_to_cn = "";
                string chinese_from_usa_from_to_tw = "";

                chinese_from_usa_from_to_cn = File.ReadAllText(TEMPLATE + @"chinese_from_usa_from_to.php", Encoding.UTF8);
                chinese_from_usa_from_to_tw = File.ReadAllText(TEMPLATE + @"chinese_from_usa_cnt_from_to.php", Encoding.UTF8);



                chinese_from_usa_from_to_cn = chinese_from_usa_from_to_cn.Replace("{###FROM_CITY_CODE###}", aie_citynamecn.CityCode);
                chinese_from_usa_from_to_cn = chinese_from_usa_from_to_cn.Replace("{###TO_CITY_CODE###}", aie_citynamecn.CityCode);
                chinese_from_usa_from_to_cn = chinese_from_usa_from_to_cn.Replace("{###FROM_OPTIOON_SELECT###}", getOptionFrom(aie_citynamefrom.CityCode,false,true ));
                chinese_from_usa_from_to_cn = chinese_from_usa_from_to_cn.Replace("{###FROM_OPTIOON###}", getOptionFrom(aie_citynamefrom.CityCode, false, false ));
                chinese_from_usa_from_to_cn = chinese_from_usa_from_to_cn.Replace("{###TO_OPTIOON_SELECT###}", getOptionTo(aie_citynamecn.CityCode, false, true));
                chinese_from_usa_from_to_cn = chinese_from_usa_from_to_cn.Replace("{###TO_OPTIOON###}", getOptionTo(aie_citynamecn.CityCode, false, false));

                chinese_from_usa_from_to_tw = chinese_from_usa_from_to_tw.Replace("{###FROM_CITY_CODE###}", aie_citynamecn.CityCode);
                chinese_from_usa_from_to_tw = chinese_from_usa_from_to_tw.Replace("{###TO_CITY_CODE###}", aie_citynamecn.CityCode);
                chinese_from_usa_from_to_tw = chinese_from_usa_from_to_tw.Replace("{###FROM_OPTIOON_SELECT###}", getOptionFrom(aie_citynamefrom.CityCode, true, true));
                chinese_from_usa_from_to_tw = chinese_from_usa_from_to_tw.Replace("{###FROM_OPTIOON###}", getOptionFrom(aie_citynamefrom.CityCode, true, false));
                chinese_from_usa_from_to_tw = chinese_from_usa_from_to_tw.Replace("{###TO_OPTIOON_SELECT###}", getOptionTo(aie_citynamecn.CityCode, true, true));
                chinese_from_usa_from_to_tw = chinese_from_usa_from_to_tw.Replace("{###TO_OPTIOON###}", getOptionTo(aie_citynamecn.CityCode, true, false));


                filename_cn = string.Format("chinese_from_usa_{0}_{1}.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                filename_tw = string.Format("chinese_from_usa_cnt_{0}_{1}.php", aie_citynamefrom.CityCode.ToLower(), aie_citynamecn.CityCode.ToLower());
                if (aie_citypair.Type == "CA")
                {
                    File.WriteAllText(OUT_CANADA_DIR + filename_cn, chinese_from_usa_from_to_cn, Encoding.UTF8);
                    File.WriteAllText(OUT_CANADA_DIR + filename_tw, chinese_from_usa_from_to_tw, Encoding.UTF8);
                }
                else
                {
                    File.WriteAllText(OUT_DIR + filename_cn, chinese_from_usa_from_to_cn, Encoding.UTF8);
                    File.WriteAllText(OUT_DIR + filename_tw, chinese_from_usa_from_to_tw, Encoding.UTF8);
                }

                
            }
            menu_ca_cn.AppendLine("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\r\n");
            menu_ca_tw.AppendLine("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\r\n");
            menu_usa_cn.AppendLine("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\r\n");
            menu_usa_tw.AppendLine("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\r\n");

            File.WriteAllText(OUT_DIR + "menu.txt", menu_ca_cn.ToString() + menu_ca_tw.ToString() + menu_usa_cn.ToString() + menu_usa_tw.ToString(), Encoding.UTF8);

        }
    }
}
