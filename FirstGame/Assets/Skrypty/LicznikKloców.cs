using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class LicznikKloców : MonoBehaviour
{
    public int liczbaPudelek;
    public Text licznik;

    public void zebranoPudelko()
    {
        liczbaPudelek++;
        licznik.text = liczbaPudelek.ToString();
    }


    void Start()
    {
        liczbaPudelek = 0;
        licznik.text = liczbaPudelek.ToString();

    }


    void Update()
    {
      if (ZbieranieKloców.reset == 1)
      {
            liczbaPudelek = 0;

            licznik.text = liczbaPudelek.ToString();
      }
    }
}
